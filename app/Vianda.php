<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vianda extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'vegetariana', 'precio'];

    public function pedido() {
        return $this->belongsTo('App\Pedido');
    }
}
