<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Administrador;

class PlataformaController extends Controller
{

  //Constructor, donde agrego excepcion del middleware de sesión administrador
  public function __construct()
  {
    $this->middleware('sesionAdministrador', ['except' => ['getLogin','postLogear']]);
  }

  //Vista principal de formulario de ingreso
  public function getLogin()
  {
    $data['title'] = "Login";
    return view('plataforma.login',$data);
  }

  public function postLogear(Request $request)
  {
    //Mensaje de error
    $messages = [
      'required' => ':Attribute es requerido',
    ];
    //Reglas de validación
    $rules = [
      'email' => 'required',
      'password' => 'required',
    ];

    //Valido los campos
    $validator = Validator::make($request->all(), $rules,$messages);

    if ($validator->fails()) {
      return redirect('plataforma/login')
      ->withErrors($validator)
      ->withInput();
    }
    //Condiciones para la consulta sql
    $where = ['email' => $request->email, 'password' => $request->password];
    $administrador = administrador::where($where)->find(1);

    //Si el usuario no existe en la base de datos, redireccionará a la vista login
    if($administrador == null)
    {
      return redirect('plataforma/login')
      ->withErrors(array("messages"=>"Datos incorrectos"))
      ->withInput();
    }else{
      //Si el usuario existe, creo las variables de sesión que se utilizarán para validar el ingreso
      $request->session()->put('sesionAdministrador', true);
      $request->session()->put('nombreAdministrador', $administrador->nombre);
      $request->session()->put('apellidoAdministrador', $administrador->apellido);
      $request->session()->put('idAdministrador', $administrador->id);
      return redirect('plataforma/principal');
    }

    //$request->session()->put('id', $usuario->id);
    //return redirect("usuario/index");

  }

  //Dashboard o panel principal de la plataforma
  public function getPrincipal(Request $request)
  {
    echo "Usuario logeado";
    //echo $request->session()->get('nombreAdministrador');
  }
}
