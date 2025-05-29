<?php

namespace App\Http\Controllers;

use App\Models\Aroma;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Colore;
use App\Models\CarritoItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportePedido;

class AdminController extends Controller
{
  
    public function dashboard()
    {
        // NuevosDiseños
        $productosSeccion1 = Producto::where('seccion_id', 1)->get();
        //poulares
        $productosSeccion2 = Producto::where('seccion_id', 2)->get();
        
        //Categoría 1 Natural 
        $productosCategoria1 = Producto::where('categoria_id', 1)->get();
        //Categoría 2 Flores
        $productosCategoria2 = Producto::where('categoria_id', 2)->get();
        //Categoría 3 Creativos
        $productosCategoria3 = Producto::where('categoria_id', 3)->get();
        return view('dashboard', compact(
            'productosSeccion1',
            'productosSeccion2',
            'productosCategoria1',
            'productosCategoria2',
            'productosCategoria3',
        ));
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        $aromas = Aroma::all(); 
        $colores = Colore::all(); 
        return view('detalleProducto', compact('producto', 'aromas', 'colores'));
    }

    public function showCarrito()
    {
        $carritoItems = CarritoItem::with('producto')->where('user_id', Auth::id())->get();
        return view('carrito', compact('carritoItems'));
    }

    public function agregar(Request $request) 
    {
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
    }

    $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'color_id' => 'required|integer',
        'aroma_id' => 'required|integer',
        'quantity' => 'required|integer|min:1',
    ]);

    $userId = Auth::id();
    $producto = Producto::findOrFail($request->producto_id);

    // Buscar si ya existe el mismo producto en el carrito
    $itemExistente = CarritoItem::where('user_id', $userId)
        ->where('producto_id', $producto->id)
        ->where('color_id', $request->color_id)
        ->where('aroma_id', $request->aroma_id)
        ->first();

    if ($itemExistente) {
        // Incrementar la cantidad existente
        $itemExistente->cantidad += $request->quantity;
        $itemExistente->save();
    } else {
        // Crear nuevo registro en el carrito
        CarritoItem::create([
            'user_id' => $userId,
            'producto_id' => $producto->id,
            'color_id' => $request->color_id,
            'aroma_id' => $request->aroma_id,
            'cantidad' => $request->quantity,
            'precio_unitario' => $producto->precio,
        ]);
    }

    return redirect()->route('carrito')->with('success', 'Producto agregado al carrito.');
    }


    public function eliminarDelCarrito($id)
    {
        $carritoItem = CarritoItem::findOrFail($id);
        if ($carritoItem->user_id !== Auth::id()) {
            return redirect()->route('carrito')->with('error', 'No puedes eliminar este producto del carrito.');
        }
        $carritoItem->delete();
        return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito.');
    }


    public function agregarVenta(Request $request)
    {
        $userId = Auth::id();
        $carritoItems = CarritoItem::where('user_id', $userId)->get();

        if ($carritoItems->isEmpty()) {
            return redirect()->route('carrito')->with('error', 'El carrito está vacío.');
        }

        // Crear la venta
        $venta = new Venta();
        $venta->user_id = $userId;
        $venta->fecha_venta = now();
        $venta->precio_total = $carritoItems->sum(function ($item) {
            return $item->cantidad * $item->precio_unitario;
        });
        $venta->save();

        foreach ($carritoItems as $item) {
            // Guardar detalle de la venta
            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $item->producto_id,
                'categoria_id' => $item->producto->categoria_id,
                'color_id' => $item->color_id,
                'aroma_id' => $item->aroma_id,
                'cantidad' => $item->cantidad,
                'subtotal' => $item->cantidad * $item->precio_unitario,
            ]);

            // Actualizar el stock del producto
            $producto = Producto::find($item->producto_id);
            if ($producto) {
                $producto->stock -= $item->cantidad;
                if ($producto->stock < 0) {
                    $producto->stock = 0; // opcional: prevenir stock negativo
                }
                $producto->save();
            }
    }

    // Vaciar el carrito después de la compra
    CarritoItem::where('user_id', $userId)->delete();

    return redirect()->route('dashboard')->with('pedido_exitoso', true);
    }
   
    
    public function detalleCompra()
    {
        $carritoItems = CarritoItem::with('producto')->where('user_id', Auth::id())->get();
        return view('detalleCompra', compact('carritoItems'));
    }

    public function enviarReporte($ventaId)
{
    $venta = Venta::with(['detalles.producto', 'detalles.aroma', 'detalles.color'])->findOrFail($ventaId);
    $user = $venta->user;

    $productos = $venta->detalles->map(function ($detalle) {
        return [
            'nombre' => $detalle->producto->nombre ?? 'Sin nombre',
            'aroma' => $detalle->aroma->nombre ?? 'N/A',
            'color' => $detalle->color->nombre ?? 'N/A',
            'cantidad' => $detalle->cantidad,
            'subtotal' => $detalle->subtotal
        ];
    });

    $total = $venta->precio_total;

    // Generar el PDF
    $pdf = Pdf::loadView('reportes.venta', compact('user', 'productos', 'total'));

    // Guardar temporalmente el PDF
    $pdfPath = storage_path('app/public/Reporte_Pedido.pdf');
    $pdf->save($pdfPath);

    // Enviar correo
    Mail::to('netflixteam8119@gmail.com')->send(new ReportePedido($user, $pdfPath));

    return redirect()->route('dashboard')->with('success', 'El reporte fue enviado con éxito.');
    }
}
