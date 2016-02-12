<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Administrador;
use App\Especialidad;
use App\Profesional;
use App\Paciente;
use App\Hora;
use App\Configuracion;

class PlataformaController extends Controller
{

  //Constructor, donde agrego excepcion del middleware de vista de login
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
      $request->session()->put('nombreUsuario', $administrador->nombre);
      $request->session()->put('apellidoUsuario', $administrador->apellido);
      $request->session()->put('idUsuario', $administrador->id);
      return redirect('plataforma/principal');
    }
  }
  //Dashboard o panel principal de la plataforma
  public function getPrincipal(Request $request)
  {
    $data['title'] = "Principal";
    $fecha = Date("Y-m-d");
    //Obtengo la hora de hoy
    $data['total_horas'] = Hora::where('fecha_hora','like','%'.$fecha.'%')
    ->count();
    $data['total_pacientes'] = Paciente::count();
    $data['total_profesionales'] = Profesional::count();
    $data['total_especialidades'] = Especialidad::count();


    return view('plataforma.principal',$data);
  }

  public function getConfiguracion(Request $request)
  {
    $data['configuracion'] = Configuracion::first();
    //En caso de no haber ningún tipo de configuración
    if($data['configuracion'] == null)
    {
      $data['configuracion'] = new Configuracion;
    }
    $data['title'] = "Configuración";
    return view('plataforma.configuracion',$data);
  }

  public function postEditarConfiguracion(Request $request)
  {
    $configuracion = Configuracion::first();
    //En caso de no haber ningún tipo de configuración
    if($configuracion == null)
    {
      $configuracion = new Configuracion;
    }
    $configuracion->nombre = $request->nombre;
    $configuracion->save();
    $request->session()->flash('message', 'Configuración editada con éxito');
    return redirect('plataforma/configuracion');
  }
}
