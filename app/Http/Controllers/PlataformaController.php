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
    $configuracion->direccion = $request->direccion;
    $configuracion->comuna = $request->comuna;
    $configuracion->ciudad = $request->ciudad;
    $configuracion->pais = $request->pais;
    $configuracion->email = $request->email;
    $configuracion->telefono = $request->telefono;
    $configuracion->telefono_secundario = $request->telefono_secundario;
    $configuracion->save();

    if( $request->hasFile('logo') ) {
      $request->file('logo')->move("sitio", "logo.png");
    }


    $request->session()->flash('message', 'Configuración editada con éxito');
    return redirect('plataforma/configuracion');
  }

  public function postEditarConfiguracionWeb(Request $request)
  {
    $configuracion = Configuracion::first();
    $configuracion->descripcion = $request->descripcion;
    $configuracion->texto_servicio = $request->texto_servicio;
    $configuracion->texto_nosotros = $request->texto_nosotros;
    $configuracion->texto_nosotros_informacion = $request->texto_nosotros_informacion;
    $configuracion->texto_infraestructura = $request->texto_infraestructura;
    $configuracion->texto_equipo = $request->texto_equipo;
    $configuracion->texto_contacto = $request->texto_contacto;
    $configuracion->update();
    $request->session()->flash('message_web', 'Configuración editada con éxito');
    return redirect('plataforma/configuracion');
  }

  public function postEditarConfiguracionWebDoctor(Request $request)
  {
    //Imagen del banner
    if( $request->hasFile('banner-bg') ) {
      $request->file('banner-bg')->move("plantillas/template_doctor/images/", "banner-bg.jpg");
    }
    //Imagen para la "nosotros"
    if( $request->hasFile('feature-img-1') ) {
      $request->file('feature-img-1')->move("plantillas/template_doctor/images/work", "feature-img-1.png");
    }
    //Imágenes para las instalaciones
    if( $request->hasFile('instalacion_1') ) {
      $request->file('instalacion_1')->move("plantillas/template_doctor/images/work", "1.jpg");
    }
    if( $request->hasFile('instalacion_2') ) {
      $request->file('instalacion_2')->move("plantillas/template_doctor/images/work", "2.jpg");
    }
    if( $request->hasFile('instalacion_3') ) {
      $request->file('instalacion_3')->move("plantillas/template_doctor/images/work", "3.jpg");
    }
    if( $request->hasFile('instalacion_4') ) {
      $request->file('instalacion_4')->move("plantillas/template_doctor/images/work", "4.jpg");
    }
    if( $request->hasFile('instalacion_5') ) {
      $request->file('instalacion_5')->move("plantillas/template_doctor/images/work", "5.jpg");
    }
    if( $request->hasFile('instalacion_6') ) {
      $request->file('instalacion_6')->move("plantillas/template_doctor/images/work", "6.jpg");
    }
    if( $request->hasFile('instalacion_7') ) {
      $request->file('instalacion_7')->move("plantillas/template_doctor/images/work", "7.jpg");
    }
    if( $request->hasFile('instalacion_8') ) {
      $request->file('instalacion_8')->move("plantillas/template_doctor/images/work", "8.jpg");
    }

    $request->session()->flash('message_web_doctor', 'Configuración editada con éxito');
    return redirect('plataforma/configuracion');
  }

}
