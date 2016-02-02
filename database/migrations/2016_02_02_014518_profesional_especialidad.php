<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfesionalEspecialidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profesional_especialidades', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
      });

      Schema::table('profesional_especialidades', function($table) {
        $table->integer('profesional_id')->unsigned();
        $table->integer('especialidad_id')->unsigned();
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
         Schema::drop('profesional_especialidades');
    }
}
