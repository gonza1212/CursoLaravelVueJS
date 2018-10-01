<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['persona_id', 'vianda_id', 'fecha_solicitud', 'fecha_entrega'];

    public function vianda() {
        return $this->hasOne('App\Vianda');
    }

    public function persona() {
        return $this->belongsTo('App\Persona');
    }
}
