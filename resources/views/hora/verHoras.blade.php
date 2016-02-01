@extends('layouts.master')
@section('title', $title )
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title-box">
          <h3>Horas </h3>
          <span>Visualización e ingreso de horas</span>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
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
          <div class="col-md-3" style="padding:10px">
            <div class="content-frame-left">
              <h4>New Event</h4>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="new-event-text" placeholder="Event text..."/>
                  <div class="input-group-btn">
                    <button class="btn btn-primary" id="new-event">Add</button>
                  </div>
                </div>
              </div>


              <h4>External Events</h4>
              <div class="list-group border-bottom" id="external-events">
                <a class="list-group-item external-event">Lorem ipsum dolor</a>
                <a class="list-group-item external-event">Nam a nisi et nisi</a>
                <a class="list-group-item external-event">Donec tristique eu</a>
                <a class="list-group-item external-event">Vestibulum cursus</a>
                <a class="list-group-item external-event">Etiam euismod</a>
                <a class="list-group-item external-event">Sed pharetra dolor</a>
              </div>

              <div class="push-up-10">
                <label class="check">
                  <input type="checkbox" class="icheckbox" id="drop-remove"/> Remove after drop
                </label>
              </div>


            </div>
          </div>
          <!-- END CONTENT FRAME LEFT -->


          <div class="col-md-9">
            <div id="alert_holder"></div>
            <div class="calendar">
              <div id="calendar"></div>
            </div>

            <!-- END CONTENT FRAME BODY -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@stop
