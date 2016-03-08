<div class="row">
  <div class="col-md-12" style="padding:10px">
    <hr>
    <h2>Resultado de horas</h2>
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
            Profesional
          </th>
          <th>
            Estado
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
            {{ $hora->profesional_nombre." ".$hora->profesional_apellido }}
          </td>
          <td>
            {{ $hora->estado_hora }}
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</div>
