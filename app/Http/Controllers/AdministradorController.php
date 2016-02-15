<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Administrador;

class AdministradorController extends Controller
{
  //Constructor, donde agrego excepcion del middleware de vista de login
  public function __construct()
  {
    $this->middleware('sesionAdministrador');
  }

  public function getVerAdministradores()
  {
    //Realizo una consulta para las especialidades
    $data['administradores'] = Administrador::orderBy('apellido', 'desc')->get();
    $data['title'] = "Administradores";
    return view('administrador.verAdministradores',$data);
  }

  //Controlador que muestra la vista con el formulario de ingreso de administradores
  public function getIngresoAdministrador()
  {
    $data['title'] = "Ingreso de administrador";
    return view('administrador.ingresoAdministrador',$data);
  }

  public function postIngresarAdministrador(Request $request)
  {
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
      return redirect('administrador/ingreso-administrador')
      ->withErrors($validator)
      ->withInput();
    }
    $administrador = new Administrador;
    $administrador->nombre = $request->nombre;
    $administrador->apellido = $request->apellido;
    $administrador->email = $request->email;
    $administrador->password = $request->password;

    $administrador->save();
    $request->session()->flash('message', 'Administrador ingresado con éxito');
    return redirect('administrador/ver-administradores');
  }

  public function getDetalleAdministrador(Request $request)
  {
    $data['id'] = $request->id;
    $data['administrador'] = Administrador::where('id', $data['id'])->first();
    $data['title'] = $data['administrador']->nombre;
    return view('administrador.detalleAdministrador',$data);
  }

  public function postEditarAdministrador(Request $request)
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
      return redirect('administrador/detalle-administrador?id='.$data['id'])
      ->withErrors($validator)
      ->withInput();
    }
    $administrador = Administrador::where('id', $data['id'])->first();
    $administrador->nombre = $request->nombre;
    $administrador->apellido = $request->apellido;
    $administrador->email = $request->email;
    $administrador->password = $request->password;
    $administrador->save();
    $request->session()->flash('message', 'Administrador editado con éxito');
    return redirect('administrador/detalle-administrador?id='.$data['id']);
  }
}
