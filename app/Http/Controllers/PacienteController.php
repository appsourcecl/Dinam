<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Paciente;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{

    //Constructor, donde agrego excepcion del middleware de vista de login
    public function __construct()
    {
      $this->middleware('sesionAdministrador');
    }

    public function getVerPacientes()
    {
      $data['title'] = "Horas";
      $data['pacientes'] = Paciente::orderBy('apellido', 'desc')->get();
      return view('paciente.verPacientes',$data);
    }

    public function getIngresoPaciente()
    {
      $data['title'] = "Ingreso de paciente";
      return view('paciente.ingresoPaciente',$data);
    }

}
