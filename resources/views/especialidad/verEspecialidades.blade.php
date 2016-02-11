@extends('layouts.master')
@section('title', $title )
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title-box">
          <h3>Especialidades</h3>
          <span>Visualización e ingreso de especialidades</span>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <a class="btn btn-success btn-mini btn-rounded" href="{{ URL::to('especialidad/ingreso-especialidad') }}">
          <i class="fa fa-edit"></i>Ingresar nueva especialidad
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
        <div class="row stacked">
          <div class="col-md-12">
            <table class="table table-bordered table-condensed table-hover datatable">
              <thead>
                <tr>
                  <th>
                    Nombre
                  </th>
                  <th>
                    Descripción
                  </th>
                  <th class="col-md-1">
                    Detalle
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($especialidades as $especialidad)
                <tr>
                  <td>
                    {{$especialidad->nombre}}
                  </td>
                  <td>
                    {{$especialidad->descripcion}}
                  </td>
                  <td>
                    <a href="{{ URL::to('especialidad/detalle-especialidad?id='.$especialidad->id) }}" class="btn btn-info btn-mini active">Ver detalle</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
