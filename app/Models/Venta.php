<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'fecha_venta',
        'precio_total',
    ];

   
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
