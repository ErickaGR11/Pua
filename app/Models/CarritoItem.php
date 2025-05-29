<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class CarritoItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'producto_id',
        'color_id',
        'aroma_id',
        'cantidad',
        'precio_unitario',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
