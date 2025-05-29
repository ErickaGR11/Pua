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
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Seccion;

class AdminController extends Controller
{
    public function welcome()
    {
        $productosSeccion2 = Producto::where('seccion_id', 2)->get(); // Populares

        return view('welcome', compact('productosSeccion2'));
    }

    public function admiDashboard()
    {
       // Total de productos en stock (suma del stock de todos los productos)
        $stockTotal = Producto::sum('stock'); 
        //total ventas
         $total = Venta::sum('precio_total');
        // Total productos vendidos (ejemplo: suma de cantidades vendidas)
        $productosVendidos = DetalleVenta::sum('cantidad'); 
        //Usuarios registrados
        $usuariosRegistrados = User::count();
        // Últimas ventas
        
        $ultimasVentas = Venta::with('detalles.producto')->orderBy('fecha_venta', 'desc')->get();

         return view('admiDashboard', compact('total', 'stockTotal','productosVendidos', 'usuariosRegistrados', 'ultimasVentas'));
    }
   
    public function ventasPorPeriodo(Request $request)
    {
        $periodo = $request->input('periodo');

        switch ($periodo) {
            case '1d':
                $desde = Carbon::now()->subDay();
                break;
            case '7d':
                $desde = Carbon::now()->subDays(7);
                break;
            case '30d':
                $desde = Carbon::now()->subDays(30);
                break;
            case '12m':
                $desde = Carbon::now()->subMonths(12);
                break;
            case 'max':
            default:
                $total = Venta::sum('precio_total');
                return response()->json(['total' => number_format($total, 2)]);
        }

        $total = Venta::where('created_at', '>=', $desde)->sum('precio_total');

        return response()->json(['total' => number_format($total, 2)]);
    }

   public function productosMasVendidos()
    {
        // Paso 1: Obtener IDs de productos más vendidos con la cantidad total vendida
        $masVendidos = DetalleVenta::select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))
            ->groupBy('producto_id')
            ->orderByDesc('total_vendido')
            ->take(5)
            ->get();

        // Paso 2: Obtener los productos con su información completa
        $productos = Producto::whereIn('id', $masVendidos->pluck('producto_id'))
            ->get()
            ->map(function ($producto) use ($masVendidos) {
                // Agregar el campo total_vendido al objeto producto
                $producto->total_vendido = $masVendidos->firstWhere('producto_id', $producto->id)->total_vendido ?? 0;
                return $producto;
            })
            // Ordenar en base a total_vendido
            ->sortByDesc('total_vendido')
            ->values();

            //Mostrar todos los productos 
            $productosAll = Producto::all();
            $categorias = Categoria::all(); 
            $secciones = Seccion::all();    

        return view('admiCrudProductos', compact('productos', 'productosAll', 'categorias', 'secciones'));
    }

    public function eliminarProducto($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }

        $producto->delete();

        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }

    public function actualizarProducto(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'url_imagen' => 'nullable|string|max:255',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->url_imagen = $request->url_imagen ?? $producto->url_imagen;   
        $producto->categoria_id = $request->categoria_id; 
        $producto->seccion_id = $request->seccion_id ?? 3;
        $producto->save();

        return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }



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
        $carritoItems = CarritoItem::with(['producto.aroma', 'producto.color'])->where('user_id', $userId)->get();


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

        // Preparar PDF y correo
        $user = Auth::user();
        $productos = $carritoItems->map(function ($item) {
        $nombreAroma = Aroma::find($item->aroma_id)?->nombre ?? 'N/A';
        $nombreColor = Colore::find($item->color_id)?->nombre ?? 'N/A';

        return (object)[
            'nombre' => $item->producto->nombre,
            'aroma' => $nombreAroma,
            'color' => $nombreColor,
            'cantidad' => $item->cantidad,
            'subtotal' => $item->cantidad * $item->precio_unitario,
        ];
        });

        $total = $venta->precio_total;
        $pdf = Pdf::loadView('reportes.pedido', compact('productos', 'total', 'user'));
        $pdfPath = storage_path('app/public/Reporte_Pedido.pdf');
        $pdf->save($pdfPath);

        Mail::to($user->email)->send(new ReportePedido($user, $pdfPath));

        // Vaciar el carrito
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
    $pdf = Pdf::loadView('reportes.pedido', compact('user', 'productos', 'total'));

    // Guardar temporalmente el PDF
    $pdfPath = storage_path('app/public/Reporte_Pedido.pdf');
    $pdf->save($pdfPath);

    // Enviar correo
    Mail::to('netflixteam8119@gmail.com')->send(new ReportePedido($user, $pdfPath));
    
    // Eliminar el PDF temporal
    Storage::delete('public/Reporte_Pedido.pdf');
    return redirect()->route('dashboard')->with('success', 'El reporte fue enviado con éxito.');
    }
}
