@extends('layouts.master')
@section('title', $title )
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title-box">
          <h3>Listado de horas </h3>
          <span>Visualización e ingreso de horas como listado</span>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <form id="formulario_principal">
          <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-md-3 control-label">Profesional</label>
                <div class="col-md-9">
                  <select name="profesional_id" class="form-control">
                    <option value="">Todos los profesionales</option>
                    @foreach ($profesionales as $profesional)
                    <option value="{{$profesional->id}}">{{ ucwords($profesional->nombre." ".$profesional->apellido) }}</option>
                    @endforeach
                  </select>
                  <span class="help-block"><br></span>
                </div>
              </div>


              <div class="form-group">
                <label class="col-md-3 control-label">Rut paciente</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                    <input type="text" name="paciente_rut" class="form-control" placeholder="12345678-5" >
                  </div>
                  <span class="help-block">Dejar en blanco si desea ver todas las horas</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">

              <div class="form-group">
                <label class="col-md-3 control-label">Día a consultar</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <input type="text" class="form-control datepicker"  name="fecha" value="{{ $fecha }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <input type="button" class="btn btn-info" onCLick="calendario_horas()" value="Consultar hora" />
            </div>
          </div>
        </form>
        <div class="row">
          <div id="resultado">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script>

function calendario_horas()
{
  $.ajax({
    url: "ajax-horas-listado",
    type: 'GET',
    data: $("#formulario_principal").serialize(),
    success: function(data) {
      $("#resultado").html(data);
    },
    error: function(xhr) {
      console.log(xhr.responseText);
    }
  });
}


</script>

@stop
