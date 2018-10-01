<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PedidoResource extends Resource
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
            'persona_id' => $this->persona_id,
            'vianda_id' => $this->vianda_id,
            'fecha_solicitud' => $this->fecha_solicitud,
            'fecha_entrega' => $this->fecha_entrega
        ];
    }
}
