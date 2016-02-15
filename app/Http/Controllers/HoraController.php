<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Profesional;
use App\Hora;
use App\Paciente;
use App\Especialidad;
use App\Estado_hora;
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
    $data['fecha'] = date("Y-m-d");
    $data['arrFecha'] = explode("-",$data['fecha']);
    //Listo a todos los profesionales
    //Realizo una consulta para las especialidades
    $data['profesionales'] = Profesional::select('nombre','apellido','id')
    ->orderBy('apellido', 'desc')
    ->get();

    $data['title'] = "Horas";
    return view('hora.verHoras',$data);
  }

  public function getAjaxCalendarioHoras(Request $request)
  {
    $data['fecha'] = $request->fecha;
    $data['arrFecha'] = explode("-",$data['fecha']);
    $data['estados'] = Estado_hora::orderBy('nombre','desc')->get();
    //Si consulta por todos los profesionales o si consulta por un solo profesional
    if($request->profesional_id == "")
    {
      $data['especialidades'] = Especialidad::orderBy('nombre','asc')->get();

      $data['todos_profesionales'] = true;
      $data['profesionales'] = Profesional::select('nombre','apellido','id')
      ->orderBy('apellido', 'desc')
      ->get();
      //Horas solicitadas del profesional
      $data['horas'] = Hora::select(
      'especialidades.nombre as especialidad_nombre',
      'horas.id',
      'horas.fecha_hora',
      'horas.comentario',
      'estado_hora.color',
      'profesionales.nombre as profesional_nombre',
      'profesionales.apellido as profesional_apellido',
      'pacientes.nombre as paciente_nombre',
      'pacientes.apellido as paciente_apellido',
      'pacientes.rut as paciente_rut')
      ->where('pacientes.rut','like','%'.$request->paciente_rut.'%')
      ->join('estado_hora','estado_hora.id','=', 'horas.estado_hora_id')
      ->join('pacientes','pacientes.id','=', 'horas.paciente_id')
      ->join('profesionales','profesionales.id','=','horas.profesional_id')
      ->join('especialidades','especialidades.id','=','horas.especialidad_id')
      ->get();
    }else{
      //Consulto por un profesional es específico
      $data['todos_profesionales'] = false;
      //Detalle del profesional
      $data['profesional'] = Profesional::where('id', $request->profesional_id)
      ->first();
      //Especialidades del profesional
      $data['especialidades'] = Especialidad::select('especialidades.id','especialidades.nombre')
      ->join('profesional_especialidades', 'profesional_especialidades.especialidad_id','=','especialidades.id')
      ->where('profesional_id',$request->profesional_id)
      ->orderBy('nombre','asc')
      ->get();
      //Horas solicitadas del profesional
      $data['horas'] = Hora::select(
      'especialidades.nombre as especialidad_nombre',
      'horas.id',
      'horas.fecha_hora',
      'horas.comentario',
      'estado_hora.color',
      'profesionales.nombre as profesional_nombre',
      'profesionales.apellido as profesional_apellido',
      'pacientes.nombre as paciente_nombre',
      'pacientes.apellido as paciente_apellido',
      'pacientes.rut as paciente_rut')
      ->where('horas.profesional_id', $request->profesional_id )
      ->join('estado_hora','estado_hora.id','=', 'horas.estado_hora_id')
      ->join('pacientes','pacientes.id','=', 'horas.paciente_id')
      ->join('profesionales','profesionales.id','=','horas.profesional_id')
      ->join('especialidades','especialidades.id','=','horas.especialidad_id')
      ->get();
      if($data['horas'] == null)
      {
        $data['horas'] = new Hora;
      }
    }

    return view('hora.ajaxCalendarioHoras',$data);
  }

  public function getAjaxDetalleHora(Request $request)
  {
    $data['hora'] = Hora::select(
    'especialidades.nombre as especialidad_nombre',
    'horas.id',
    'horas.fecha_hora',
    'horas.comentario',
    'estado_hora.color',
    'profesionales.nombre as profesional_nombre',
    'profesionales.apellido as profesional_apellido',
    'pacientes.nombre as paciente_nombre',
    'pacientes.apellido as paciente_apellido',
    'pacientes.rut as paciente_rut')
    ->join('estado_hora','estado_hora.id','=', 'horas.estado_hora_id')
    ->join('pacientes','pacientes.id','=', 'horas.paciente_id')
    ->join('profesionales','profesionales.id','=','horas.profesional_id')
    ->join('especialidades','especialidades.id','=','horas.especialidad_id')
    ->where('horas.id', $request->id)
    ->first();
    return response::Json($data);
  }

  public function getAjaxBuscarPaciente(Request $request)
  {
    $data['paciente_rut'] = $request->paciente_rut;
    $data['paciente'] = Paciente::where('rut','like','%'.$data['paciente_rut']."%")->first();
    if(isset($data['paciente']))
    {
      $data['estado'] = true;
    }else{
      $data['estado'] = false;
    }
    return response::Json($data);
  }

  public function postAjaxIngresarHora(Request $request)
  {
    //Creo un modelo para ingresar las horas
    $hora = new Hora;
    $fecha = explode("-",$request->dia);
    $hora->fecha_hora = $fecha[2]."-".$fecha[1]."-".$fecha[0]." ".$request->hora;
    $hora->profesional_id = $request->profesional_id;
    $hora->especialidad_id = $request->especialidad_id;
    if($request->paciente_comprobado == "false")
    {
      $paciente = Paciente::where("rut",$request->rut)->first();
      if($paciente == null)
      {
      $paciente = new Paciente;
      }
      $paciente->rut = $request->rut;
      $paciente->nombre = $request->nombre;
      $paciente->apellido = $request->apellido;
      $paciente->email = $request->email;
      $paciente->numero_telefono = $request->numero_telefono;
      $paciente->celular = $request->celular;
      $paciente->save();
      $hora->paciente_id = $paciente->id;
    }else{
      $hora->paciente_id = $request->paciente_id;
    }

    $hora->estado_hora_id = $request->estado_hora_id;
    $hora->comentario = $request->comentario;
    $hora->save();
    $data['hora'] = $hora;
    $data['estado'] = true;
    return response::Json($data);
  }


  public function getReservarHora()
  {
    $data['title'] = "Horas";
    return view('layouts.construccion',$data);
  }
}
