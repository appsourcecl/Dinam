<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profesional;
use App\Especialidad;
use App\Profesional_especialidad;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class ProfesionalController extends Controller
{
  //Constructor, donde agrego excepcion del middleware de vista de login
  public function __construct()
  {
    $this->middleware('sesionAdministrador');
  }

  public function getVerProfesionales()
  {
    //Realizo una consulta para las especialidades
    $data['profesionales'] = Profesional::orderBy('apellido', 'desc')->get();
    $data['title'] = "Profesionales";
    return view('profesional.verProfesionales',$data);
  }

  //Controlador que muestra la vista con el formulario de ingreso de profesionales
  public function getIngresoProfesional()
  {
    //Listado de especialidades para ingresar al profesional
    $data['especialidades'] = Especialidad::orderBy('nombre', 'desc')->get();

    $data['title'] = "Ingreso de profesional";
    return view('profesional.ingresoProfesional',$data);
  }

  public function postIngresarProfesional(Request $request)
  {
    //Mensaje de error
    $messages = [
      'required' => ':Attribute es requerido',
      'unique' => ':El email ya se ha ingresado anteriormente',
    ];
    //Reglas de validación
    $rules = [
      'nombre' => 'required',
      'apellido' => 'required',
      'email' => 'required|unique:profesionales',
      'password' => 'required'
    ];
    //Valido los campos
    $validator = Validator::make($request->all(), $rules,$messages);
    if ($validator->fails()) {
      return redirect('profesional/ingreso-profesional')
      ->withErrors($validator)
      ->withInput();
    }
    $profesional = new profesional;
    $profesional->nombre = $request->nombre;
    $profesional->apellido = $request->apellido;
    $profesional->email = $request->email;
    $profesional->password = $request->password;
    $profesional->save();

    //Ingreso las especialidades del profesional en base al arreglo de checkbox del formulario
    foreach($request->chkEspecialidades as $especialidad_id)
    {
      $profesional_especialidad = new profesional_especialidad;
      $profesional_especialidad->especialidad_id = $especialidad_id;
      $profesional_especialidad->profesional_id = $profesional->id;
      $profesional_especialidad->save();
    }

    $request->session()->flash('message', 'profesional ingresado con éxito');
    return redirect('profesional/ver-profesionales');
  }

  public function getDetalleProfesional(Request $request)
  {
    $data['id'] = $request->id;
    //Listado de especialidades para ingresar al profesional
    $data['especialidades'] = Especialidad::orderBy('nombre', 'desc')
    ->get();

    $data['profesional_especialidades'] = Profesional_especialidad::orderBy('id', 'desc')
    ->where('profesional_id',$data['id'])
    ->get();

    $data['profesional'] = profesional::where('id', $data['id'])->first();
    $data['title'] = $data['profesional']->nombre;
    return view('profesional.detalleProfesional',$data);
  }

  public function postEditarProfesional(Request $request)
  {
    //Recibo las variables post
    $data['id'] = $request->id;
    //Mensaje de error
    $messages = [
      'required' => ':Attribute es requerido',
    ];
    //Reglas de validación
    $rules = [
      'nombre' => 'required',
      'apellido' => 'required',
      'email' => 'required',
      'password' => 'required'
    ];
    //Valido los campos
    $validator = Validator::make($request->all(), $rules,$messages);
    if ($validator->fails()) {
      return redirect('profesional/detalle-profesional?id='.$data['id'])
      ->withErrors($validator)
      ->withInput();
    }
    $profesional = profesional::where('id', $data['id'])->first();
    $profesional->nombre = $request->nombre;
    $profesional->apellido = $request->apellido;
    $profesional->email = $request->email;
    $profesional->password = $request->password;
    $profesional->save();

    $profesional_especialidad = new profesional_especialidad;
    profesional_especialidad::where('profesional_id', $profesional->id)->delete();
    //Ingreso las especialidades del profesional en base al arreglo de checkbox del formulario
    foreach($request->chkEspecialidades as $especialidad_id)
    {
      $profesional_especialidad = new profesional_especialidad;
      $profesional_especialidad->especialidad_id = $especialidad_id;
      $profesional_especialidad->profesional_id = $profesional->id;
      $profesional_especialidad->save();
    }

    $request->session()->flash('message', 'profesional editado con éxito');
    return redirect('profesional/detalle-profesional?id='.$data['id']);
  }
}
