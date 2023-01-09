<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juguete extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function categorias() {

        //Un juguete pertenece a una categoria
        return $this->belongsTo(Categoria::class, 'categoria_id');
        
    }

    public function experiencias() {

        return $this->hasMany(Experiencia::class, 'experiencia_id');
        
    }

    public function favoritos() {

        return $this->hasMany(Favorito::class, 'favorito_id');
        
    }



}
