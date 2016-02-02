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
<script>
$('#calendario').fullCalendar({
  defaultView: 'agendaWeek',
  allDaySlot: false,
  header: {
    left: 'prev,next today myCustomButton',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
  }
});
$('#calendario').fullCalendar( 'gotoDate', '{{ $fecha }}');

</script>
