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
      $table->string('url_logo')->nullable();
      $table->string('email')->nullable();
      $table->string('telefono')->nullable();
      $table->string('telefono_secundario')->nullable();
      $table->string('informacion', 2000)->nullable();
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
