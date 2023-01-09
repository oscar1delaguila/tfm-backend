<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function juguetes() {

        //una categoria tiene muchos juguetes
        return $this->hasMany(Juguete::class, 'id');
        
    }

}
