<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paciente extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('pacientes', function (Blueprint $table) {
      $table->increments('id');
      $table->string('rut')->unique();
      $table->string('nombre');
      $table->string('apellido');
      $table->date('nacimiento');
      $table->string('email')->nullable();
      $table->string('password', 255);
      $table->string('celular')->nullable();
      $table->string('numero_telefono')->nullable();
      $table->rememberToken();
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
    Schema::drop('pacientes');
  }
}
