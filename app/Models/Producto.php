<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function carritoItems()
    {
        return $this->hasMany(CarritoItem::class);
    }
}
