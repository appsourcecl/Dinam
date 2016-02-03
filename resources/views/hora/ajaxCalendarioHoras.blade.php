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
    <span class="label label-success">Instructivo</span> Para generar una hora, usted debe hacer click al calendario
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
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa-clock-o"></span> Registrar : <span id="hora_seleccionada"></span></div>
      <div class="mb-content">
        <form>
          <br>
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
            </form>
          </div>
          <div class="mb-footer">
            <span  class="btn btn-success btn-lg pull-left mb-control-close" >Ingresar hora al sistema</span>
            <span onclick="cancelar_hora()" class="btn btn-danger btn-lg pull-right mb-control-close" >Cancelar</span>
          </div>
        </div>
      </div>
    </div>

    <script>
    $('#calendario').fullCalendar({
      defaultView: 'agendaWeek',
      allDaySlot: false,
      header: {
        left: 'prev,next today myCustomButton',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      dayClick: function(date, jsEvent, view) {
        //alert('Clicked on: ' + date.format());
        $("#hora_seleccionada").html(date.format("MM/DD/YYYY, h:mm:ss"));
        $("#message-box-hora").show();
      }
    });
    $('#calendario').fullCalendar( 'gotoDate', '{{ $fecha }}');

    function cancelar_hora()
    {
      $("#message-box-hora").hide();
    }

    </script>
