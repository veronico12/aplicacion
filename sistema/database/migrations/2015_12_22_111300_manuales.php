<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Manuales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('manuales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('ruta');
            $table->string('extencion');
            $table->integer('chekent');
            $table->string('nombre2');
            $table->string('ruta2');
            $table->string('extencion2');
            $table->timestamps();
            $table->integer('id_extras')->unsigned();
            $table->foreign('id_extras')->references('id')->on('archivos');


        });
        

    }

    public function down()
    {
        //
    }
}
