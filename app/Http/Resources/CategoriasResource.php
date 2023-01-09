<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)  {

        //return parent::toArray($request);
        return [

            'id' => $this->id,
            'nombre_categoria' => $this->nombre_categoria,
            'subcategoria1' =>$this->subcategoria1,
            'subcategoria2' =>$this->subcategoria2
 
        ];
    }
}
