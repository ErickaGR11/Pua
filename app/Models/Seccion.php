<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'secciones'; // Nombre de la tabla en la base de datos
    protected $fillable = ['nombre', 'descripcion']; // Campos que se pueden llenar masivamente

    public function productos()
    {
        return $this->hasMany(Producto::class, 'seccion_id'); // Relación con el modelo Producto
    }
}
