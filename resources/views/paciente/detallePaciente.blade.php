@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="row">
  <div class="col-md-12">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $paciente->id }}">
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
                        <i class="fa fa-mars"></i> 37 años
                      </td>
                      <td>
                        <i class="fa fa-hand-rock-o"></i> 120/90 mmHg
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa fa-cutlery"></i> 70 kg
                      </td>
                      <td>
                        <i class="fa fa-heartbeat"></i> 90 Ppm
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa fa-arrows-v"></i> 170 Cm
                      </td>
                      <td>
                        <i class="fa fa-area-chart"></i> 100 Frec. Resp.
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa fa-sun-o"></i>  36º Celsius
                      </td>
                      <td>
                        <i class="fa fa-compass"></i> 98% Sat. O2
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <span class="btn btn-xs btn-info"><i class="fa fa-plus"></i> Nueva medición</span>
                        <span class="btn btn-xs btn-warning"><i class="fa fa-calendar"></i> Ver historial</span>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-8">

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
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Rut *</label>
                <div class="col-md-6 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
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
                <label class="col-md-3 col-xs-12 control-label">Email</label>
                <div class="col-md-6 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                    <input type="text" value="{{ $paciente->email }}" name="email" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Télefono</label>
                <div class="col-md-6 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                    <input type="text" value="{{ $paciente->numero_telefono }}" name="numero_telefono" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Celular</label>
                <div class="col-md-6 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                    <input type="text" value="{{ $paciente->celular }}" name="celular" class="form-control">
                  </div>
                </div>
              </div>
              <!-- Listado de especialidades del paciente  -->
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

@stop
