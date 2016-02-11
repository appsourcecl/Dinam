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
      $table->string('comentario',2000)->nullable();
      $table->timestamps();
    });

    Schema::table('horas', function(Blueprint $table) {
      $table->integer('paciente_id')->unsigned();
      $table->integer('especialidad_id')->unsigned();
      $table->integer('profesional_id')->unsigned();
      $table->integer('estado_hora_id')->unsigned();
      $table->foreign('paciente_id')->references('id')->on('pacientes');
      $table->foreign('especialidad_id')->references('id')->on('especialidades');
      $table->foreign('profesional_id')->references('id')->on('profesionales');
      $table->foreign('estado_hora_id')->references('id')->on('estado_hora');
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
