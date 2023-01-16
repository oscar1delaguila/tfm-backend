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
        Schema::create('juguetes', function (Blueprint $table) {

            $table->engine="InnoDB";  //permite borrar en cascada.
            $table->id('id');
            $table->string('titulo',255);
            $table->timestamp('fecha_publicacion');
            $table->string('descripcion',5000);
            $table->float('precio', 8, 2);
            $table->integer('num_votaciones');
            $table->float('puntuacion',3,1);
            $table->integer('edad');

            $table->boolean('pro1')->default(false);
            $table->boolean('pro2')->default(false);
            $table->boolean('pro3')->default(false);
            $table->boolean('pro4')->default(false);
            $table->boolean('pro5')->default(false);
            $table->boolean('pro6')->default(false);

            $table->boolean('contra1')->default(false);
            $table->boolean('contra2')->default(false);
            $table->boolean('contra3')->default(false);
            $table->boolean('contra4')->default(false);
            $table->boolean('contra5')->default(false);
            $table->boolean('contra6')->default(false);


            $table->string('marca');
            $table->string('material');
            
            $table->string('ancho');
            $table->string('largo');
            $table->string('alto');

            $table->string('path_video1')->nullable();
            $table->string('path_video2')->nullable();
            $table->string('path_video3')->nullable();
            $table->string('path_imagen');
            $table->string('imagen1')->nullable();
            $table->string('imagen2')->nullable();
            $table->string('imagen3')->nullable();
            $table->string('imagen4')->nullable();
            $table->string('imagen5')->nullable();
            $table->string('imagen6')->nullable();
            $table->string('imagen7')->nullable();
            $table->string('imagen8')->nullable();
            $table->boolean('publicado')->default(false);
            $table->string('path_amazon')->nullable();
            //$table->timestamps();

            //manera antigua
            //$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
            
            //manera actual (el campo ya lo crea por defecto)
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juguetes');
    }
};
