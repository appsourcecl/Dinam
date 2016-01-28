@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="row">
  <div class="col-md-12">
    <form action="{{ URL::to('profesional/editar-profesional') }}" method="post" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{ $profesional->id }}">
      <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
          <div class="panel-title">
            <h3>profesional : {{ $profesional->nombre." ".$profesional->apellido }}</h3>
          </div>
          <ul class="panel-controls panel-controls-title">
            <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
          </ul>

        </div>
        <div class="panel-body">
          <a href="{{ URL::to('profesional/ver-profesionales') }}" class="btn btn-mini btn-info btn-rounded">
            <i class="fa fa-reply-all"></i>Volver al listado de profesionales
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
        <label class="col-md-3 col-xs-12 control-label">Nombre</label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="text" value="{{ $profesional->nombre }}" name="nombre" class="form-control">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Apellido</label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="text" value="{{ $profesional->apellido }}" name="apellido" class="form-control">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Email</label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="text" value="{{ $profesional->email }}" name="email" class="form-control">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Password</label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="password" value="{{ $profesional->password }}" name="password" class="form-control">
          </div>
        </div>
      </div>

    </div>
    <div class="panel-footer">
      <input type="submit" class="btn btn-success" value="Editar profesional" />
    </div>
  </div>
</form>
</div>
</div>

@stop
