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
        Schema::create('categorias', function (Blueprint $table) {

            
            
            $table->engine="InnoDB";  //permite borrar en cascada.
            $table->id('id');
            $table->string('nombre_categoria',255);
            $table->string('subcategoria1',255);
            $table->string('subcategoria2',255);
            $table->string('imagen_categoria',255);
            $table->string('imagen_subcat1',255);
            $table->string('imagen_subcat2',255);

            //$table->timestamps();

            //$table->bigInteger('categoria_id')->unsigned();
            //$table->foreign('')->references('id')->on('categorias')->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
