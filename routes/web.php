<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admiDashboard', function () {
    return view('admiDashboard'); 
})->middleware(['auth', 'verified'])->name('admiDashboard');

Route::get('/admiCrudProductos', function () {
    return view('admiCrudProductos'); 
})->middleware(['auth', 'verified'])->name('admiCrudProductos');

Route::get('/detalleProducto/{id}', [AdminController::class, 'show'])->name('detalleProducto');
Route::get('/detalleCompra', [AdminController::class, 'detalleCompra'])->middleware(['auth', 'verified'])->name('detalleCompra');

Route::post('/venta/agregar', [AdminController::class, 'agregarVenta'])->name('venta.agregar');

Route::get('/carrito', [AdminController::class, 'showCarrito'])->name('carrito');
Route::post('/carrito/agregar', [AdminController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [AdminController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');


Route::post('/enviarpdf', [AdminController::class, 'enviarpdf'])->name('enviarpdf');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';
