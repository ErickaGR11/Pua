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

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
