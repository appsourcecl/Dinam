@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="row">
  <div class="col-md-12">
    <form action="{{ URL::to('profesional/ingresar-profesional') }}" method="post" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
          <div class="panel-title">
            <h3>Ingreso de profesional</h3>
          </div>
          <ul class="panel-controls panel-controls-title">
            <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
          </ul>

        </div>
        <div class="panel-body">
          <a href="{{ URL::to('profesional/ver-profesionales') }}" class="btn btn-mini btn-info btn-rounded">
            <i class="fa fa-reply-all"></i>Volver al listado de profesionales
          </a>
          <br><br><br>

          @if (count($errors) > 0)
          <div class="row">
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </center>
        </div>
      </div>
      @endif
      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Rut</label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="text" value="{{ $profesional->rut }}" name="rut" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Nombre</label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="text" name="nombre" class="form-control">
          </div>
          <span class="help-block">Ingrese el nombre del profesional</span>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Apellido </label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="text" name="apellido" class="form-control">
          </div>
          <span class="help-block">Ingrese el apellido del profesional</span>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Email </label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="text" name="email" class="form-control">
          </div>
          <span class="help-block">Ingrese el email del profesional</span>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Password</label>
        <div class="col-md-6 col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input type="password" name="password" class="form-control">
          </div>
          <span class="help-block">Ingrese el password del profesional</span>
        </div>
      </div>

      <!-- Listado de especialidades del profesional  -->
      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Especialidades</label>
        <div class="col-md-6 col-xs-12">
          @foreach ($especialidades as $especialidad)
          <label class="check">
            <div class="icheckbox_minimal-grey" style="position: relative;">
              <input type="checkbox" name="chkEspecialidades[]" value="{{ $especialidad->id }}" class="icheckbox" style="position: absolute; opacity: 0;">
              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
            </div>
            {{$especialidad->nombre}}
          </label>
          <br>
          @endforeach
          <span class="help-block">Puede seleccionar más de una especialidad</span>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-xs-12 control-label">
            <span onclick="ver_dias()" class="btn btn-xs btn-info"><i class="fa fa-calendar"></i> Días/horas laborales </span>
          </div>
          <div class="col-md-6 col-xs-12">
          </div>
        </div>
        <div id="dias_laborales" style="display:none;" class="row">
          <label class="col-md-3 col-xs-12 control-label">Días</label>
          <div class="col-md-6 col-xs-12">
            <label class="check">
              <div class="icheckbox_minimal-grey" style="position: relative;">
                <input id="check_1"  type="checkbox" name="lunes" class="icheckbox" style="position: absolute; opacity: 0;">
                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
              </div>
            </label>
            Lunes
            <br><br>
            <input id="hora_inicio_1" name="hora_inicio_lunes" type="text" class="timepicker24"  /> / <input id="hora_fin_1" name="hora_fin_lunes" type="text" class="timepicker24"  />
            <hr>
            <label class="check">
              <div class="icheckbox_minimal-grey" style="position: relative;">
                <input id="check_2" type="checkbox" name="martes" class="icheckbox" style="position: absolute; opacity: 0;">
                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
              </div>
            </label>
            Martes
            <br><br>
            <input type="text" id="hora_inicio_2" name="hora_inicio_martes" class="timepicker24"  /> / <input id="hora_fin_2" name="hora_fin_martes" type="text" class="timepicker24"  />
            <hr>
            <label class="check">
              <div class="icheckbox_minimal-grey" style="position: relative;">
                <input id="check_3"   type="checkbox" name="miercoles" class="icheckbox" style="position: absolute; opacity: 0;">
                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
              </div>
            </label>
            Miércoles
            <br><br>
            <input id="hora_inicio_3" name="hora_inicio_miercoles" type="text" class="timepicker24"  /> / <input id="hora_fin_3" name="hora_fin_miercoles" type="text" class="timepicker24"  />
            <hr>
            <label class="check">
              <div class="icheckbox_minimal-grey" style="position: relative;">
                <input id="check_4"  type="checkbox" name="jueves" class="icheckbox" style="position: absolute; opacity: 0;">
                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
              </div>
            </label>
            Jueves
            <br><br>
            <input id="hora_inicio_4" name="hora_inicio_jueves" type="text" class="timepicker24"  /> / <input id="hora_fin_4" name="hora_fin_jueves" type="text" class="timepicker24"  />
            <hr>
            <label class="check">
              <div class="icheckbox_minimal-grey" style="position: relative;">
                <input id="check_5"   type="checkbox" name="viernes" class="icheckbox" style="position: absolute; opacity: 0;">
                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
              </div>
            </label>
            Viernes
            <br><br>
            <input id="hora_inicio_5" name="hora_inicio_viernes" type="text" class="timepicker24"  /> / <input id="hora_fin_5" name="hora_fin_viernes" type="text" class="timepicker24"  />
            <hr>
            <label class="check">
              <div class="icheckbox_minimal-grey" style="position: relative;">
                <input id="check_6"   type="checkbox" name="sabado" class="icheckbox" style="position: absolute; opacity: 0;">
                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
              </div>
            </label>
            Sábado
            <br><br>
            <input id="hora_inicio_6" name="hora_inicio_sabado" type="text" class="timepicker24"  /> / <input id="hora_fin_6" name="hora_fin_sabado" type="text" class="timepicker24"  />
            <hr>
            <label class="check">
              <div class="icheckbox_minimal-grey" style="position: relative;">
                <input id="check_0"  type="checkbox" name="domingo" class="icheckbox" style="position: absolute; opacity: 0;">
                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
              </div>
            </label>
            Domingo
            <br><br>
            <input id="hora_inicio_0" name="hora_inicio_domingo" type="text" class="timepicker24"  /> / <input id="hora_fin_0" name="hora_fin_domingo" type="text" class="timepicker24"  />
            <hr>
          </div>
        </div>
      </div>
      <br>

    </div>
    <div class="panel-footer">
      <input type="submit" class="btn btn-success" value="Ingresar profesional" />
    </div>
  </div>
</form>
</div>
</div>
<script>
var dias_laborales = false;
function ver_dias()
{
  if(dias_laborales == false){
    $("#dias_laborales").show();
    dias_laborales = true;
  }else{
    $("#dias_laborales").hide();
    dias_laborales = false;
  }
}
</script>

@stop
