@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title">
          <h3>Paciente : {{ ucwords($paciente->nombre." ".$paciente->apellido) }}</h3>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <a href="{{ URL::to('paciente/ver-pacientes') }}" class="btn btn-mini btn-info btn-rounded">
          <i class="fa fa-reply-all"></i>Volver al listado de pacientes
        </a>
        <br><br><br>
        <div class="panel panel-default tabs">
          <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="#tab-ficha" role="tab" data-toggle="tab" aria-expanded="true">Datos Clínicos</a></li>
            <li class=""><a href="#tab-datos" role="tab" data-toggle="tab" aria-expanded="false">Datos personales</a></li>
          </ul>
          <div class="panel-body tab-content">
            <div class="tab-pane active" id="tab-ficha">
              <div class="row">
                @if (! empty(Session::get('message_ficha_clinica')))
                <div class="row">
                  <center>
                    <div class="alert alert-success">
                      {{Session::get('message_ficha_clinica')}}
                    </div>
                  </center>
                </div>
                @endif
                <div class="col-md-4">
                  <table style="font-size:14px;" class="table table-bordered table-hover">
                    <tr>
                      <td colspan="2">
                        <center>
                          <b>{{ ucwords($paciente->nombre." ".$paciente->apellido) }}</b>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa fa-birthday-cake"></i> {{ $paciente->edad }} años
                      </td>
                      <td>
                        <i class="fa fa-hand-rock-o"></i> {{ $ficha_clinica->hipertencion }} mmHg
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa fa-cutlery"></i> {{ $ficha_clinica->peso }} kg
                      </td>
                      <td>
                        <i class="fa fa-heartbeat"></i> {{ $ficha_clinica->ppm }} Ppm
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa fa-arrows-v"></i> {{ $ficha_clinica->altura }} Cm
                      </td>
                      <td>
                        <i class="fa fa-area-chart"></i> {{ $ficha_clinica->respiracion }} Frec. Resp.
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa fa-sun-o"></i>  {{ $ficha_clinica->temperatura }}º Celsius
                      </td>
                      <td>
                        <i class="fa fa-compass"></i> {{ $ficha_clinica->saturacion }}% Sat. O2
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <center>
                          <b>Actualizado al {{ $ficha_clinica->created_at }}</b>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <span onclick="ingreso_nueva_ficha_medica()" class="btn btn-xs btn-info"><i class="fa fa-plus"></i> Nueva medición</span>
                        <a target="_blank" href="{{ URL::to('paciente/ver-fichas-clinicas-paciente?id='.$paciente->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-calendar"></i> Ver historial</a>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-8">
                  <table class="table table-bordered table-condensed">
                    <tr>
                      <td>
                        <b>
                          Historia
                        </b>
                      </td>
                      <td>
                        <input class="form-control" placeholder="Buscar en la historia clínica" type="text" name="historia">
                      </td>
                      <td class="col-md-4">
                        <center>
                          <div class="btn-group">
                            <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle"><i class="fa fa-filter"></i>Filtrar <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if( $tipo_atencion_id != "" )
                                <li><a href="{{ URL::to('paciente/detalle-paciente?id='.$paciente->id) }}">Ver todos</a></li>
                                @endif
                                @foreach ($tipos_atenciones as $tipo_atencion)
                                <li><a href="{{ URL::to('paciente/detalle-paciente?id='.$paciente->id.'&tipo_atencion_id='.$tipo_atencion->id) }}"><i class="{{ $tipo_atencion->icono }}"></i>{{ $tipo_atencion->nombre }}</a></li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="btn-group">
                              <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle"><i class="fa fa-plus"></i>Nuevo <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                @foreach ($tipos_atenciones as $tipo_atencion)
                                <li>
                                  <a href="{{ URL::to('paciente/ingreso-atencion?paciente_id='.$paciente->id.'&tipo_atencion_id='.$tipo_atencion->id) }}">
                                    <i class="{{ $tipo_atencion->icono }}"></i>
                                    {{ $tipo_atencion->nombre }}
                                  </a>
                                </li>
                                @endforeach
                              </ul>
                            </div>
                          </center>
                        </td>
                      </tr>
                    </table>
                    <div  style="overflow-x:hidden; overflow-y:scroll;height:400px; background-color:#e8e8e8;padding:10px;border: 1px solid #ccc">
                      <div class="timeline timeline-right">
                        @foreach($atenciones as $atencion)
                        <div class="timeline-item timeline-item-right">
                          <div class="timeline-item-info">{{ $atencion->fecha }}</div>
                          <div class="timeline-item-icon"><span class="{{ $atencion->icono }}"></span></div>
                          <div class="timeline-item-content">
                            <div class="timeline-heading">
                              <a href="#">{{ $atencion->nombre }}</a> : {{ $atencion->titulo }}
                            </div>
                            <div class="timeline-body">
                                <a class="col-md-12 btn btn-info" href="detalle-atencion?id={{ $atencion->id }}">Ver detalle</a>
                            </div>
                          </div>
                        </div>
                        @endforeach

                        <!-- END TIMELINE ITEM -->
                      </div>
                      <!-- END TIMELINE -->

                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-datos">
                <br>
                @if (count($errors) > 0)
                <div class="row">
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                </center>
              </div>
              @endif
              @if (! empty(Session::get('message')))
              <div class="row">
                <center>
                  <div class="alert alert-success">
                    {{Session::get('message')}}
                  </div>
                </center>
              </div>
              @endif
              <form action="{{ URL::to('paciente/editar-paciente') }}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $paciente->id }}">
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Rut *</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-user"></span></span>
                      <input type="text" value="{{ $paciente->rut }}" name="rut" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Nombre *</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $paciente->nombre }}" name="nombre" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Apellido *</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $paciente->apellido }}" name="apellido" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Fecha de nacimiento </label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-birthday-cake"></span></span>
                      <input type="text" value="{{ $paciente->nacimiento }}" name="nacimiento" class="form-control datepicker">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Email</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                      <input type="text" value="{{ $paciente->email }}" name="email" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Télefono</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                      <input type="text" value="{{ $paciente->numero_telefono }}" name="numero_telefono" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Celular</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                      <input type="text" value="{{ $paciente->celular }}" name="celular" class="form-control">
                    </div>
                  </div>
                </div>
                <br>
                <br>
                <input type="submit" class="btn btn-success" value="Editar paciente" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
    </div>
  </div>
</div>




<!-- popups -->
<form id="formulario_ficha_clinica" action="{{ URL::to('paciente/ingresar-ficha-clinica') }}" method="post">
  <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="message-box message-box-info animated fadeIn" data-sound="alert" id="message-box-ficha-clinica">
    <div class="mb-container">
      <div class="mb-middle">
        <div class="mb-title"><span class="fa fa-plus"></span> Ingresar nueva medición</div>
        <div class="mb-content">
          <table class="table table-condensed">
            <tr>
              <td>
                <label class="control-label">Hipertencion (mmHg)</label>
                <br>
                <input placeholder="120/90" type="text" value="" name="hipertencion" class="form-control">
              </td>
              <td>
                <label class="control-label">Peso (Kg)</label>
                <br>
                <input placeholder="60" type="text" value="" name="peso" class="form-control">
              </td>
              <td>
                <label class="control-label">Pulso (Ppm)</label>
                <br>
                <input placeholder="90" type="text" value="" name="ppm" class="form-control">
              </td>
              <td>
                <label class="control-label">Altura (Cm)</label>
                <br>
                <input placeholder="170" type="text" value="" name="altura" class="form-control">
              </td>
            </tr>
            <tr>
              <td>
                <label class="control-label">Frecuencia Respiratoria </label>
                <br>
                <input placeholder="100" type="text" value="" name="respiracion" class="form-control">
              </td>
              <td>
                <label class="control-label">Temperatura (Cº)</label>
                <br>
                <input placeholder="36" type="text" value="" name="temperatura" class="form-control">
              </td>
              <td>
                <label class="control-label">Saturacion O2 (%)</label>
                <br>
                <input placeholder="98" type="text" value="" name="saturacion" class="form-control">
              </td>
            </tr>

          </table>
        </div>
        <div class="mb-footer">
          <button type="submit" class="btn btn-success btn-lg pull-left" >Ingresar medición</button>
          <span onclick="cerrar_nueva_ficha_medica()" class="btn btn-danger btn-lg pull-right mb-control-close" >Cancelar</span>
        </div>
      </div>
    </div>
  </div>
</form>

<script>

function ingreso_nueva_ficha_medica()
{
  $("#message-box-ficha-clinica").show();
}
function cerrar_nueva_ficha_medica()
{
  $("#message-box-ficha-clinica").hide();
}

</script>

@stop
