@extends('layouts.master')
@section('title', $title )
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title-box">
          <h3>Mensajes</h3>
          <span>Listado de mensajes</span>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <div class="content-frame-body content-frame-body-left">

          <div class="messages messages-img">
            @foreach ($mensajes as $mensaje)
            <div class="item in">
              <div class="text">
                <div class="heading">
                  <a href="#">{{ $mensaje->nombre_usuario }}</a>
                  <span class="date">{{ $mensaje->fecha }}</span>
                </div>
                {{ $mensaje->contenido }}
              </div>
            </div>
            @endforeach
          </div>
          <form action="{{ URL::to('mensaje/ingresar-mensaje') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel panel-default push-up-10">
              <div class="panel-body panel-body-search">
                <div class="input-group">
                  <input type="text" class="form-control" name="contenido" placeholder="Su mensaje..."/>
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-success">Enviar mensaje</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
