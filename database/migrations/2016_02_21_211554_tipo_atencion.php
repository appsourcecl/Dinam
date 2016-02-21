<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoAtencion extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('tipo_atencion', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre',5000);
      $table->string('icono',20);
      $table->timestamps();
    });

    DB::table('tipo_atencion')->insert(array(
      'nombre' => 'Consulta general',
      'icono' => 'fa fa-user-md',
    ));
    DB::table('tipo_atencion')->insert(array(
      'nombre' => 'Plan de tratamiento',
      'icono' => 'fa fa-list',
    ));
    DB::table('tipo_atencion')->insert(array(
      'nombre' => 'Vacuna',
      'icono' => 'fa fa-eyedropper',
    ));
    DB::table('tipo_atencion')->insert(array(
      'nombre' => 'Examen',
      'icono' => 'fa fa-heartbeat',
    ));
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
