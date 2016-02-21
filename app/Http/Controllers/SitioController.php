<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SitioController extends Controller
{
    public function getIndex()
    {
      $data['configuracion'] = Configuracion::first();
      $data['title'] = $data['configuracion']->nombre;
      return view('sitio.index',$data);
    }

    public function getReservaHora()
    {
      $data['configuracion'] = Configuracion::first();
      $data['title'] = $data['configuracion']->nombre." - Reserva de hora";
      return view('sitio.reservaHora',$data);
    }
}

?>
