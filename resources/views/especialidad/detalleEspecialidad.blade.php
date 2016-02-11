@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="row">
  <div class="col-md-12">
    <form action="{{ URL::to('especialidad/editar-especialidad') }}" method="post" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{ $especialidad->id }}">
      <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
          <div class="panel-title">
            <h3>{{ $especialidad->nombre }}</h3>
          </div>
          <ul class="panel-controls panel-controls-title">
            <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
          </ul>

        </div>
        <div class="panel-body">
          <a href="{{ URL::to('especialidad/ver-especialidades') }}" class="btn btn-mini btn-info btn-rounded">
            <i class="fa fa-reply-all"></i>Volver al listado
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
          @if (! empty(Session::get('message')))
          <div class="row">
            <center>
              <div class="alert alert-success">
                {{Session::get('message')}}
              </div>
            </center>
          </div>
          @endif

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Nombre *</label>
            <div class="col-md-6 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" value="{{ $especialidad->nombre }}" name="nombre" class="form-control">
              </div>
              <span class="help-block">Ingrese el nombre de la especialidad</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Descripción</label>
            <div class="col-md-6 col-xs-12">
              <textarea name="descripcion" class="form-control" rows="5">{{ $especialidad->descripcion }}</textarea>
              <span class="help-block">El texto debe tener un máximo de 1.000 caracteres  </span>
            </div>
          </div>



        </div>
        <div class="panel-footer">
          <input type="submit" class="btn btn-success" value="Editar especialidad" />
        </div>
      </div>
    </form>
  </div>
</div>

@stop
