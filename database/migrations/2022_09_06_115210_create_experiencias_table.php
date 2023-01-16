<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {

            $table->engine="InnoDB";  //permite borrar en cascada.
            $table->id('id');
            $table->string('titulo',255);
            $table->string('descripcion',5000);
            $table->timestamp('fecha_publicacion');
            $table->string('imagen_experiencia',255)->nullable();
            $table->float('valoracion',3, 1);
            $table->boolean('publicado')->default(false);
            
            //$table->timestamps();
            
            //manera antigua
            //$table->foreign('juguete_id')->references('id')->on('juguetes')->onDelete("cascade");

            //manera actual (el campo juguete_id ya lo crea por defecto)
            $table->foreignId('juguete_id')->constrained('juguetes')->onDelete('cascade');   
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencias');
    }
};
