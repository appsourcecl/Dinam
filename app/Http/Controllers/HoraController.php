<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HoraController extends Controller
{

  //Constructor, donde agrego excepcion del middleware de vista de login
  public function __construct()
  {
    $this->middleware('sesionAdministrador');
  }

  public function getVerHoras()
  {
    $data['title'] = "Horas";
    return view('layouts.construccion',$data);
  }

  public function getReservarHora()
  {
    $data['title'] = "Horas";
    return view('layouts.construccion',$data);
  }
}
