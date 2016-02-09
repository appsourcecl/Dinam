<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profesional extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('profesionales', function (Blueprint $table) {
      $table->increments('id');
      $table->string('rut')->nullable();
      $table->string('nombre');
      $table->string('apellido');
      $table->string('email')->nullable();
      $table->string('celular')->nullable();
      $table->string('horas_laborales',2000)->nullable();
      $table->string('password', 255);
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
    Schema::drop('profesionales');
  }
}
