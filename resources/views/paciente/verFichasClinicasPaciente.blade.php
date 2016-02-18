@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title">
          <h3>Historial clínico del paciente {{ ucwords($paciente->nombre." ".$paciente->apellido) }}</h3>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
                Actualización
              </th>
              <th>
                mmHg
              </th>
              <th>
                Peso (Kg)
              </th>
              <th>
                Pulso (Ppm)
              </th>
              <th>
                Altura (Cm)
              </th>
              <th>
                Respiración (F.r)
              </th>
              <th>
                Temperatura
              </th>
              <th>
                Saturación O2
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($fichas_clinicas as $ficha_clinica)
            <tr>
              <td>
                {{$ficha_clinica->created_at}}
              </td>
              <td>
                {{$ficha_clinica->hipertencion}}
              </td>
              <td>
                {{$ficha_clinica->peso}}
              </td>
              <td>
                {{$ficha_clinica->ppm}}
              </td>
              <td>
                {{$ficha_clinica->altura}}
              </td>
              <td>
                {{$ficha_clinica->respiracion}}
              </td>
              <td>
                {{$ficha_clinica->temperatura}}
              </td>
              <td>
                {{$ficha_clinica->saturacion}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@stop
