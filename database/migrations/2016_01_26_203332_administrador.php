<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Administrador extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('administradores', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre');
      $table->string('apellido');
      $table->string('email')->unique();
      $table->string('password', 255);
      $table->rememberToken();
      $table->timestamps();
    });

    DB::table('administradores')->insert(array(
					'nombre' => 'Luis',
          'apellido' => 'Aguilera',
					'email' => 'teps@live.cl',
					'password' => '1234'
		));
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
       Schema::drop('administradores');
  }
}
