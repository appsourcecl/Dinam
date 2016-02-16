<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Configuracion extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('configuraciones', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre')->nullable();
      $table->string('descripcion')->nullable();
      $table->string('direccion')->nullable();
      $table->string('comuna')->nullable();
      $table->string('ciudad')->nullable();
      $table->string('pais')->nullable();
      $table->string('email')->nullable();
      $table->string('telefono')->nullable();
      $table->string('telefono_secundario')->nullable();
      $table->text('texto_servicio', 5000)->nullable();
      $table->text('texto_nosotros', 5000)->nullable();
      $table->text('texto_nosotros_informacion', 5000)->nullable();
      $table->text('texto_infraestructura', 5000)->nullable();
      $table->text('texto_equipo', 5000)->nullable();
      $table->text('texto_contacto', 5000)->nullable();
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    //
  }
}
