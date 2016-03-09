<div class="row">
  <div class="col-md-12" style="padding:10px">
    <hr>
    <h4>Resultado de horas</h4>
    <table class="table table-bordered table-condensed datatable">
      <thead>
        <tr>
          <th>
            Fecha
          </th>
          <th>
            Paciente
          </th>
          <th>
            Rut Paciente
          </th>
          <th>
            Profesional
          </th>
          <th>
            Estado
          </th>
          <th>
            Detalle
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($horas as $hora)
        <tr>
          <td>
            {{ $hora->fecha_hora }}
          </td>
          <td>
            {{ $hora->paciente_nombre." ".$hora->paciente_apellido }}
          </td>
          <td>
            {{ $hora->paciente_rut }}
          </td>
          <td>
            {{ $hora->profesional_nombre." ".$hora->profesional_apellido }}
          </td>
          <td>
            <center>
            <span style="background-color:{{ $hora->color }};color:#fff;border-radius:4px" class="btn">{{ $hora->estado_hora_nombre }}</span>
            </center>
          </td>
          <td>
            <center>
            <a href="{{ URL::to('hora/detalle-hora?id='.$hora->id) }}" class="btn btn-info btn-mini">Ver detalle</a>
            </center>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</div>
