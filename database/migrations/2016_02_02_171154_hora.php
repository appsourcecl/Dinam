<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hora extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('horas', function (Blueprint $table) {
      $table->increments('id');
      $table->dateTime('fecha_hora');
      $table->timestamps();
    });

    Schema::table('horas', function($table) {
      $table->integer('paciente_id')->unsigned()->nullable();
      $table->integer('especialidad_id')->unsigned()->nullable();
      $table->integer('profesional_id')->unsigned()->nullable();
      $table->string('comentario',2000)->unsigned()->nullable();
      $table->foreign('paciente_id')->references('id')->on('pacientes');
      $table->foreign('especialidad_id')->references('id')->on('especialidades');
      $table->foreign('profesional_id')->references('id')->on('profesionales');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('horas');
  }
}
