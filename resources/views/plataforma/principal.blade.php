@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="content-frame-top">
  <div class="page-title">
    <h3>{{ ucwords(Session::get('nombreUsuario'))." ".ucwords(Session::get('apellidoUsuario')) }}</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="col-md-4">
      <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
        <div class="widget-item-left">
          <span class="fa fa-clock-o"></span>
        </div>
        <div class="widget-data">
          <div class="widget-int num-count">{{ $total_horas }}</div>
          <div class="widget-title">Horas</div>
          <div class="widget-subtitle">Pendientes y por confirmar</div>
        </div>
        <div class="widget-controls">
          <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
        <div class="widget-item-left">
          <span class="fa fa-envelope"></span>
        </div>
        <div class="widget-data">
          <div class="widget-int num-count">54</div>
          <div class="widget-title">Mensajes</div>
          <div class="widget-subtitle">Sin revisar / Pendientes</div>
        </div>
        <div class="widget-controls">
          <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="widget widget-default widget-carousel">
        <div class="owl-carousel" id="owl-example">
          <div>
            <div class="widget-title">Pacientes</div>
            <div class="widget-int">{{ $total_pacientes }}</div>
          </div>
          <div>
            <div class="widget-title">Especialidades</div>
            <div class="widget-int">{{ $total_especialidades }}</div>
          </div>
          <div>
            <div class="widget-title">Profesionales</div>
            <div class="widget-int">{{ $total_profesionales }}</div>
          </div>
        </div>
        <div class="widget-controls">
          <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div>
  <div class="col-md-12">

    <!-- START SALES & EVENTS BLOCK -->
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title-box">
          <h3>Gráfico de horas solicitadas y realizadas</h3>
          
        </div>

      </div>
      <div class="panel-body padding-0">

      </div>
    </div>
    <!-- END SALES & EVENTS BLOCK -->

  </div>
</div>

@stop
