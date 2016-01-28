<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Especialidad;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class EspecialidadController extends Controller
{
  //Constructor, donde agrego excepcion del middleware de vista de login
  public function __construct()
  {
    $this->middleware('sesionAdministrador');
  }

  public function getVerEspecialidades()
  {
    //Realizo una consulta para las especialidades
    $data['especialidades'] = Especialidad::orderBy('nombre', 'desc')->get();
    $data['title'] = "Especialidades";
    return view('especialidad.verEspecialidades',$data);
  }

  //Controlador que muestra la vista con el formulario de ingreso de especialidad
  public function getIngresoEspecialidad()
  {
    $data['title'] = "Ingreso de especialidad";
    return view('especialidad.ingresoEspecialidad',$data);
  }

  public function postIngresarEspecialidad(Request $request)
  {
    //Mensaje de error
    $messages = [
      'required' => ':Attribute es requerido',
    ];
    //Reglas de validación
    $rules = [
      'nombre' => 'required'
    ];
    //Valido los campos
    $validator = Validator::make($request->all(), $rules,$messages);
    if ($validator->fails()) {
      return redirect('especialidad/ingreso-especialidad')
      ->withErrors($validator)
      ->withInput();
    }
    $especialidad = new Especialidad;
    $especialidad->nombre = $request->nombre;
    $especialidad->descripcion = $request->descripcion;
    $especialidad->save();
    $request->session()->flash('message', 'Especialidad ingresada con éxito');
    return redirect('especialidad/ver-especialidades');
  }

  public function getDetalleEspecialidad(Request $request)
  {
    $data['id'] = $request->id;
    $data['especialidad'] = Especialidad::where('id', $data['id'])->first();
    $data['title'] = $data['especialidad']->nombre;
    return view('especialidad.detalleEspecialidad',$data);
  }

  public function postEditarEspecialidad(Request $request)
  {
    //Recibo las variables post
    $data['id'] = $request->id;
    //Mensaje de error
    $messages = [
      'required' => ':Attribute es requerido',
    ];
    //Reglas de validación
    $rules = [
      'nombre' => 'required'
    ];
    //Valido los campos
    $validator = Validator::make($request->all(), $rules,$messages);
    if ($validator->fails()) {
      return redirect('especialidad/detalle-especialidad?id='.$data['id'])
      ->withErrors($validator)
      ->withInput();
    }
    $especialidad = Especialidad::where('id', $data['id'])->first();
    $especialidad->nombre = $request->nombre;
    $especialidad->descripcion = $request->descripcion;
    $especialidad->save();
    $request->session()->flash('message', 'Especialidad editada con éxito');
    return redirect('especialidad/detalle-especialidad?id='.$data['id']);
  }

}
