@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="row">
  <div class="col-md-12">
    <form action="{{ URL::to('paciente/ingresar-paciente') }}" method="post" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
          <div class="panel-title">
            <h3>Ingreso de Paciente</h3>
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
          </div>
          @endif

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Rut *</label>
            <div class="col-md-6 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" name="rut" class="form-control">
              </div>
              <span class="help-block">Ingrese el nombre del paciente</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Nombre *</label>
            <div class="col-md-6 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" name="nombre" class="form-control">
              </div>
              <span class="help-block">Ingrese el nombre del paciente</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Apellido *</label>
            <div class="col-md-6 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" name="apellido" class="form-control">
              </div>
              <span class="help-block">Ingrese el apellido del paciente</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Email </label>
            <div class="col-md-6 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" name="email" class="form-control">
              </div>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Teléfono </label>
            <div class="col-md-6 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" name="numero_telefono" class="form-control">
              </div>

            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Celular </label>
            <div class="col-md-6 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" name="celular" class="form-control">
              </div>

            </div>
          </div>
        </div>
        <div class="panel-footer">
          <input type="submit" class="btn btn-success" value="Ingresar paciente" />
        </div>
      </div>
    </form>
  </div>
</div>

@stop
