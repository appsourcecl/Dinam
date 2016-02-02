@extends('layouts.master')
@section('title', $title )
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title-box">
          <h3>Profesionales</h3>
          <span>Visualización e ingreso de profesionales del sistema</span>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <a class="btn btn-success btn-mini btn-rounded" href="{{ URL::to('profesional/ingreso-profesional') }}">
          <i class="fa fa-edit"></i>Ingresar nuevo profesional
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
                    Apellido
                  </th>
                  <th>
                    Email
                  </th>
                  <th class="col-md-1">
                    Detalle
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($profesionales as $profesional)
                <tr>
                  <td>
                    {{ucwords($profesional->nombre)}}
                  </td>
                  <td>
                    {{ucwords($profesional->apellido)}}
                  </td>
                  <td>
                    {{$profesional->email}}
                  </td>
                  <td>
                    <a href="{{ URL::to('profesional/detalle-profesional?id='.$profesional->id) }}" class="btn btn-info btn-mini active">Ver detalle</a>
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
