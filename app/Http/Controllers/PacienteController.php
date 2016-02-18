<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Paciente;
use App\Http\Controllers\Controller;
use App\Ficha_clinica;

class PacienteController extends Controller
{

  //Constructor, donde agrego excepcion del middleware de vista de login
  public function __construct()
  {
    $this->middleware('sesionAdministrador');
  }

  public function getVerPacientes()
  {
    $data['title'] = "Pacientes";
    $data['pacientes'] = Paciente::orderBy('apellido', 'desc')->get();
    return view('paciente.verPacientes',$data);
  }

  public function getIngresoPaciente()
  {
    $data['title'] = "Ingreso de paciente";
    return view('paciente.ingresoPaciente',$data);
  }

  public function postIngresarPaciente(Request $request)
  {
    //Mensaje de error
    $messages = [
      'required' => ':Attribute es requerido',
      'unique' => ':El :Attribute ya se ha ingresado anteriormente',
    ];
    //Reglas de validación
    $rules = [
      'rut' => 'required|unique:pacientes',
      'nombre' => 'required',
      'apellido' => 'required',

    ];
    //Valido los campos
    $validator = Validator::make($request->all(), $rules,$messages);
    if ($validator->fails()) {
      return redirect('paciente/ingreso-paciente')
      ->withErrors($validator)
      ->withInput();
    }
    $paciente = new paciente;
    $paciente->rut = $request->rut;
    $paciente->nombre = $request->nombre;
    $paciente->apellido = $request->apellido;
    $paciente->nacimiento = $request->nacimiento;
    $paciente->email = $request->email;
    $paciente->numero_telefono = $request->numero_telefono;
    $paciente->celular = $request->celular;
    $paciente->save();

    $request->session()->flash('message', 'paciente ingresado con éxito');
    return redirect('paciente/ver-pacientes');
  }

  public function getDetallePaciente(Request $request)
  {
    $data['id'] = $request->id;
    $data['paciente'] = paciente::where('id', $data['id'])->first();
    $data['title'] = $data['paciente']->nombre." ".$data['paciente']->apellido;
    $data['paciente']->edad = $this->getEdad($data['paciente']->nacimiento);

    $data['ficha_clinica'] = ficha_clinica::where('paciente_id',$data['id'])
    ->orderBy('id','desc')
    ->first();
    if(!isset($data['ficha_clinica']))
    {
      $data['ficha_clinica'] = new ficha_clinica;
    }
    return view('paciente.detallePaciente',$data);
  }

  function getEdad($date) {
    list($Y,$m,$d) = explode("-",$date);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
  }

  public function postEditarPaciente(Request $request)
  {
    //Recibo las variables post
    $data['id'] = $request->id;
    //Mensaje de error
    $messages = [
      'required' => ':Attribute es requerido',
      'unique' => ':El :Attribute ya se ha ingresado anteriormente',
    ];
    //Reglas de validación
    $rules = [
      'rut' => 'required',
      'nombre' => 'required',
      'apellido' => 'required',

    ];
    $validator = Validator::make($request->all(), $rules,$messages);
    if ($validator->fails()) {
      return redirect('paciente/detalle-paciente?id='.$data['id'])
      ->withErrors($validator)
      ->withInput();
    }

    $paciente = paciente::where('id', $data['id'])->first();
    $paciente->rut = $request->rut;
    $paciente->nombre = $request->nombre;
    $paciente->apellido = $request->apellido;
    $paciente->nacimiento = $request->nacimiento;
    $paciente->email = $request->email;
    $paciente->numero_telefono = $request->numero_telefono;
    $paciente->celular = $request->celular;
    $paciente->update();

    $request->session()->flash('message', 'paciente editado con éxito');
    return redirect('paciente/detalle-paciente?id='.$data['id']);
  }

  //Ingreso de ficha clinica
  public function postIngresarFichaClinica(Request $request)
  {
    $ficha_clinica = new Ficha_clinica;
    $ficha_clinica->hipertencion = $request->hipertencion;
    $ficha_clinica->peso = $request->peso;
    $ficha_clinica->ppm = $request->ppm;
    $ficha_clinica->altura = $request->altura;
    $ficha_clinica->respiracion = $request->respiracion;
    $ficha_clinica->temperatura = $request->temperatura;
    $ficha_clinica->saturacion = $request->saturacion;
    $ficha_clinica->paciente_id = $request->paciente_id;
    $ficha_clinica->save();
    $request->session()->flash('message_ficha_clinica', 'Ficha clinica ingresada con éxito');
    return redirect('paciente/detalle-paciente?id='.$request->paciente_id);
  }

}
