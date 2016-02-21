<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Atencion extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('atenciones', function (Blueprint $table) {
      $table->increments('id');
      $table->dateTime('fecha');
      $table->string('titulo',500);
      $table->string('descripcion',5000);
      $table->timestamps();
    });

    Schema::table('atenciones', function($table) {
      $table->integer('paciente_id')->unsigned();
      $table->foreign('paciente_id')->references('id')->on('pacientes');
      $table->integer('tipo_atenticion_id')->unsigned();
      $table->foreign('paciente_id')->references('id')->on('pacientes');
      $table->foreign('tipo_atenticion_id')->references('id')->on('tipo_atencion');
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
