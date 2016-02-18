<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FichasClinicas extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('fichas_clinicas', function (Blueprint $table) {
      $table->increments('id');
      $table->string('hipertencion',20);
      $table->double('peso');
      $table->double('ppm');
      $table->double('altura');
      $table->double('respiracion');
      $table->double('temperatura');
      $table->double('saturacion');
      $table->timestamps();
    });

    Schema::table('fichas_clinicas', function($table) {
      $table->integer('paciente_id')->unsigned();
      $table->foreign('paciente_id')->references('id')->on('pacientes');
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
