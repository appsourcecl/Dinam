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
  <div class="col-md-12" style="padding:10px">
    <hr>
    <h2>
      @if ($todos_profesionales)
      Todos los profesionales
      @else
      {{ ucwords($profesional->nombre." ".$profesional->apellido) }}
      @endif
    </h2>
    <span class="label label-success">Instructivo</span> Para generar una hora, usted debe posicionarse en el calendario y hacer click en una casilla (hora)
  </div>
</div>
<div class="row stacked">

  <!-- END CONTENT FRAME LEFT -->
  <div class="col-md-12">
    <div id="alert_holder"></div>
    <div class="calendar">
      <div id="calendario"></div>
    </div>

    <!-- END CONTENT FRAME BODY -->

  </div>
</div>

<div class="message-box animated fadeIn" data-sound="alert" id="message-box-hora">
  <div class="mb-container" style="top:0%;">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa-clock-o"></span> Registrar : <span id="hora_seleccionada"></span></div>
      <div class="mb-content" >
        <form id="formulario_hora">
          <input type="hidden" id="paciente_comprobado" name="paciente_comprobado" value="false" />
          <input type="hidden" id="paciente_id" name="paciente_id" value="false" />
          <br>
          <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
              <table class="table table-condensed">
                <tr>
                  <td>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Fecha</label>
                      <div class="col-md-9">
                        <div class="input-group">
                          <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                          <input name="dia" id="dia" type="text" class="form-control datepicker"  name="dia" value="" data-date="06-06-2014" data-date-format="dd-mm-yyyy">
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Hora</label>
                      <div class="col-md-9">
                        <div class="input-group bootstrap-timepicker timepicker">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                          <input name="hora" id="hora" type="text" class="form-control timepicker24">

                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Profesional</label>
                      <div class="col-md-9">
                        <select name="profesional_id" class="form-control">
                          @foreach ($profesionales as $profesional)
                          <option value="{{$profesional->id}}">{{ ucwords($profesional->nombre." ".$profesional->apellido) }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Especialidad</label>
                      <div class="col-md-8">
                        <select name="especialidad_id" class="form-control">
                          @foreach ($especialidades as $especialidad)
                          <option value="{{$especialidad->id}}">{{ ucwords($especialidad->nombre) }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="form-group">
                      <label class="col-md-3 control-label">Rut Paciente</label>
                      <div class="col-md-9">
                        <input type="text" id="paciente_rut_buscador" name="paciente_rut" placeholder="12345678-5" class="form-control">
                        <span class="help-block"><span onClick="buscar_paciente()" class="btn btn-info btn-xs ">Comprobar paciente</span> <span id="cargando_paciente"></span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>

              <div id="datos_paciente">
                <table class="table table-condensed">
                  <tr>
                    <td colspan="3">
                      <label class="control-label">Datos personales del paciente</label>
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Rut *
                    </th>
                    <th>
                      Nombre *
                    </th>
                    <th>
                      Apellido *
                    </th>
                  </tr>

                  <tr>
                    <th>
                      <input id="paciente_rut" name="rut" class="form-control" placeholder="Rut" />
                    </th>
                    <th>
                      <input id="paciente_nombre" name="nombre" class="form-control" placeholder="Nombre" />
                    </th>
                    <th>
                      <input id="paciente_apellido" name="apellido" class="form-control" placeholder="Apellido" />
                    </th>
                  </tr>
                  <tr>
                    <th>
                      Número
                    </th>
                    <th>
                      Celular
                    </th>
                    <th>
                      E-mail
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <input id="paciente_numero_telefono" name="numero_telefono" class="form-control" placeholder="Número" />
                    </th>
                    <th>
                      <input id="paciente_celular" name="celular" class="form-control" placeholder="Celular" />
                    </th>
                    <th>
                      <input id="paciente_email" name="email" class="form-control" placeholder="E-mail" />
                    </th>
                  </tr>
                </table>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Comentario</label>
                <div class="col-md-9">
                  <textarea type="text" name="comentario" class="form-control"></textarea>
                </div>
              </div>


            </form>
          </div>
          <div class="mb-footer">
            <span onclick="ingresar_hora()" class="btn btn-success btn-lg pull-left mb-control-close" >Ingresar hora al sistema</span>&nbsp;&nbsp;&nbsp; <span id="cargando_formulario_hora"></span>
            <span onclick="cancelar_hora()" class="btn btn-danger btn-lg pull-right mb-control-close" >Cancelar</span>
          </div>
          <br><br>
        </div>
      </div>
    </div>

    <script>
    $( "#dia" ).datepicker();
    //$( "#hora" ).timepicker();
    if($(".timepicker24").length > 0)
    $(".timepicker24").timepicker({minuteStep: 5,showSeconds: true,showMeridian: false});

    $('#calendario').fullCalendar({
      defaultView: 'agendaWeek',
      allDaySlot: false,
      header: {
        left: 'prev,next today myCustomButton',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      businessHours: {
        start: '10:00', // hora final
        end: '18:00', // hora inicial
        dow: [ 1, 2, 3, 4, 5 ] // dias de semana, 0=Domingo
      },
      dayClick: function(date, jsEvent, view) {
        //alert('Clicked on: ' + date.format());
        $("#hora_seleccionada").html(date.format("MM-DD-YYYY, h:mm:ss"));
        $("#dia").val(date.format("MM-DD-YYYY"));
        $("#hora").val(date.format("h:mm:ss"));
        $("#message-box-hora").show();
      }
    });
    $('#calendario').fullCalendar( 'gotoDate', '{{ $fecha }}');

    function cancelar_hora()
    {
      $("#message-box-hora").hide();
    }

    function buscar_paciente()
    {
      var paciente_rut = $("#paciente_rut_buscador").val();
      if(paciente_rut.length >= 4)
      {
        $.ajax({
          url: "ajax-buscar-paciente?paciente_rut="+paciente_rut,
          type: 'GET',
          dataType: "json",
          beforeSend: function() {
            $("#cargando_paciente").html("<img style='width:20px' src='{{ URL::asset('img/loaders/default.gif') }}'></span>");
          },
          success: function(data) {
            console.log(data);
            if(data.estado == false)
            {
              swal("Ops!", "El rut ingresado no existe (o pudo haberse digitado mal)", "error");
              $("#paciente_rut").val(paciente_rut);
              $("#paciente_comprobado").val("false");
            }else{
              $("#paciente_comprobado").val("true");
              $("#paciente_id").val(data.paciente.id);
              $("#paciente_rut").val(data.paciente.rut);
              $("#paciente_nombre").val(data.paciente.nombre);
              $("#paciente_apellido").val(data.paciente.apellido);
              $("#paciente_numero_telefono").val(data.paciente.numero_telefono);
              $("#paciente_celular").val(data.paciente.celular);
              $("#paciente_email").val(data.paciente.email);
            }
            $("#cargando_paciente").html("");
          },
          error: function(xhr) {
            console.log(xhr.responseText);
          }
        });
      }else{
        swal("Ops!", "El rut debe tener al menos 4 carácteres", "error");
      }

    }

    function ingresar_hora()
    {
      if($("#paciente_rut").val() == "" || $("#paciente_nombre").val() == "" || $("#paciente_apellido").val() == "" || $("#dia").val() == "" || $("#hora").val() == "")
      {
        swal("Ops!", "Debe completar los campos obligatorios de la hora", "error");
      }else{
        $.ajax({
          url: "ajax-ingresar-hora",
          type: 'POST',
          data : $("#formulario_hora").serialize(),
          dataType: "json",
          beforeSend: function() {
            $("#cargando_formulario_hora").html("<img style='width:35px' src='{{ URL::asset('img/loaders/default.gif') }}'></span>");
          },
          success: function(data) {
            console.log(data);
            if(data.estado == true)
            {
              $("#cargando_formulario_hora").html("");
              swal('Hora ingresada', 'La hora ha sido ingresada correctamente !' , 'success');
            }
          },
          error: function(xhr) {
              swal('Ops !', 'Hubo un error al ingresar la hora, por favor revise los datos' , 'error');
            console.log(xhr.responseText);
          }

        });
      }
    }

    </script>