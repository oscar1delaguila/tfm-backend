<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JugueteIdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {

        
        //return parent::toArray($request);
        return [

            'id' => $this->id,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            //'categoria' => CategoriasResource::collection($this->categorias()->get()),
            'categorias' => $this->categorias()->findOrFail($this->categoria_id),
            'path_imagen' => $this->path_imagen,
            'precio' => $this->precio,
            'num_votaciones' => $this->num_votaciones,
            'marca' => $this->marca,
            'puntuacion' => $this->puntuacion,
            'imagen1' => $this->imagen1
        
        ];

    }
}
