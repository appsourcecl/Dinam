<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Profesional;
use App\Hora;
use App\Paciente;
use App\Especialidad;
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
    //Si consulta por todos los profesionales o si consulta por un solo profesional
    if($request->profesional_id == "")
    {
      $data['especialidades'] = Especialidad::orderBy('nombre','asc')->get();
      $data['todos_profesionales'] = true;
      $data['profesionales'] = Profesional::select('nombre','apellido','id')
      ->orderBy('apellido', 'desc')
      ->get();
    }else{
      //Consulto por un profesional es específico
      $data['todos_profesionales'] = false;
      //Detalle del profesional
      $data['profesional'] = Profesional::where('id', $request->profesional_id)
      ->first();
      //Especialidades del profesional
      $data['especialidades'] = Especialidad::select('especialidades.id','especialidades.nombre')
      ->join('profesional_especialidades', 'profesional_especialidades.especialidad_id', '=', 'especialidades.id')
      ->where('profesional_id',$request->profesional_id)
      ->orderBy('nombre','asc')
      ->get();
      //Horas solicitadas del profesional
      $data['horas'] = Hora::where('profesional_id', $request->profesional_id )
      ->get();
    }

    return view('hora.ajaxCalendarioHoras',$data);
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

    $hora = new Hora;
    $fecha = explode("-",$request->dia);
    $hora->fecha_hora = $fecha[2]."-".$fecha[1]."-".$fecha[0]." ".$request->hora;
    $hora->profesional_id = $request->profesional_id;
    $hora->especialidad_id = $request->especialidad_id;
    $hora->paciente_id = $request->paciente_id;
    $hora->comentario = $request->comentario;
    $hora->save();
    $data['estado'] = true;
    return response::Json($data);
  }

  public function getAjaxVerHoras()
  {
    $month  = date('m');
    $year   = date('Y');
    $data = array();
    $data[] = array('title'=>'Lorem ipsum dolor sit amet','start'=>$year.'-'.$month.'-01','className'=>'green');
    $data[] = array('title'=>'Donec eget ligula','start'=>$year.'-'.$month.'-03','className'=>'blue');
    $data[] = array('title'=>'Curabitur dapibus lectus','start'=>$year.'-'.$month.'-03','className'=>'red');
    $data[] = array('title'=>'Vivamus non','start'=>$year.'-'.$month.'-03','className'=>'orange');
    $data[] = array('title'=>'Duis sagittis','start'=>$year.'-'.$month.'-08');
    $data[] = array('title'=>'Nullam eget mauris','start'=>$year.'-'.$month.'-05','end'=>$year.'-'.$month.'-07','className'=>'red');
    $data[] = array('title'=>'Proin laoreet justo nec','start'=>$year.'-'.$month.'-16','className'=>'orange');
    $data[] = array('title'=>'Ut faucibus sapien','start'=>date("Y-m-d"));
    $data[] = array('title'=>'Donec porta orci dapibus','start'=>$year.'-'.$month.'-21','end'=>$year.'-'.$month.'-28','className'=>'blue');
    $data[] = array('title'=>'Phasellus ac arcu in tortor faucibus pharetra','start'=>$year.'-'.$month.'-21','end'=>$year.'-'.$month.'-25','className'=>'red');
    return response()->json($data);

  }

  public function getReservarHora()
  {
    $data['title'] = "Horas";
    return view('layouts.construccion',$data);
  }
}
