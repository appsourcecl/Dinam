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
      $table->date('fecha');
      $table->string('titulo',500);
      $table->string('descripcion',10000);
      $table->timestamps();
    });

    Schema::table('atenciones', function($table) {
      $table->integer('paciente_id')->unsigned();
      $table->foreign('paciente_id')->references('id')->on('pacientes');
      $table->integer('tipo_atencion_id')->unsigned();
      $table->foreign('tipo_atencion_id')->references('id')->on('tipo_atencion');
      $table->integer('profesional_id')->unsigned();
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
    //
  }
}
