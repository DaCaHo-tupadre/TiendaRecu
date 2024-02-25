<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
       'id_producto','nombre', 'descripcion', 'unidades', 'precio_unitario', 'categoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }
}
