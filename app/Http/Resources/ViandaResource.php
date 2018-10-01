<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ViandaResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'vegetariana' => $this->vegetariana,
            'precio' => $this->precio
        ];
    }
}
