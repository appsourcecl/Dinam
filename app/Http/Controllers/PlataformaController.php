<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlataformaController extends Controller
{
  //Vista principal de formulario de ingreso
  public function getLogin()
  {
    $data['title'] = "Login";
    return view('plataforma.login',$data);
  }

  public function postLogear()
  {

  }

  //Dashboard o panel principal de la plataforma
  public function getPrincipal()
  {

  }
}
