<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MensajeController extends Controller
{
  //Constructor, donde agrego excepcion del middleware de vista de login
  public function __construct()
  {
    $this->middleware('sesionAdministrador', ['except' => ['getLogin','postLogear']]);
  }

  public function getVerMensajes()
  {
    $data['mensajes'] = Mensaje::get();
    $data['title'] = "Mensajes";
    return view('mensaje.verMensajes',$data);
  }

  public function postIngresarMensaje(Request $request)
  {
    $mensaje = new Mensaje;
    $mensaje->nombre_usuario = ucwords($request->session()->get('nombreUsuario'))." ".ucwords($request->session()->get('apellidoUsuario'));
    $mensaje->contenido = $request->contenido;
    $mensaje->fecha = date('Y-m-d h:m');
    $mensaje->save();
    return redirect('mensaje/ver-mensajes');
  }
}
