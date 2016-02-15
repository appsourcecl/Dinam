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
      $data['texto_servicio'] = $data['configuracion']->texto_servicio;
      $data['texto_nosotros'] = $data['configuracion']->texto_nosotros;
      return view('sitio.index',$data);
    }
}
