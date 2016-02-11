<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Especialidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('especialidades', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('descripcion',1000)->nullable();
        $table->timestamps();
      });

      DB::table('especialidades')->insert(array(
            'nombre' => 'Sin especialidad',
      ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('especialidades');
    }
}
