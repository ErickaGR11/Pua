<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id',
        'producto_id',
        'categoria_id',
        'color_id',
        'aroma_id',
        'cantidad',
        'subtotal',
    ];

     public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
        public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
