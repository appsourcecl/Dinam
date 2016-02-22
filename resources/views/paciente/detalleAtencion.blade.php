@extends('layouts.master')
@section('title', $title )
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title-box">
          <h3><i class="{{ $tipo_atencion->icono }}"></i> {{ $tipo_atencion->nombre }} para {{ ucwords($paciente->nombre." ".$paciente->apellido) }}</h3>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <a class="btn btn-mini btn-info btn-rounded" href="{{ URL::to('paciente/detalle-paciente?id='.$paciente->id) }}">
          <i class="fa fa-reply-all"></i>Volver al detalle del paciente
        </a>
        <br><br><br>
        @if (! empty(Session::get('message')))
        <div class="row">
          <center>
            <div class="alert alert-success">
              {{Session::get('message')}}
            </div>
          </center>
        </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <form action="{{ URL::to('paciente/editar-atencion') }}" method="post" class="form-horizontal">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $atencion->id }}" />
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Fecha </label>
                <div class="col-md-6 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <input type="text" value="{{ $atencion->fecha }}" name="fecha" class="form-control datepicker">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Título </label>
                <div class="col-md-6 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                    <input type="text" value="{{ $atencion->titulo }}" name="titulo" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 col-xs-12 control-label">Descripción </label>
                <div class="col-md-8 col-xs-12">
                  <div class="input-group col-md-12">
                    <textarea type="text" name="descripcion" rows="7" class="summernote">{{ $atencion->descripcion }}</textarea>
                  </div>
                </div>
              </div>
              <input type="submit" class="btn btn-success" value="Editar atención" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
