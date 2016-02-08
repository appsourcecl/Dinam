@extends('layouts.master')
@section('title', $title )

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title">
          <h3>Configuración</h3>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <div class="panel panel-default tabs">
          <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="#tab-principal" role="tab" data-toggle="tab" aria-expanded="true">Principal</a></li>
            <li class=""><a href="#tab-horas" role="tab" data-toggle="tab" aria-expanded="false">Interfaz</a></li>
            <li class=""><a href="#tab-mensajes" role="tab" data-toggle="tab" aria-expanded="false">E-mails</a></li>
          </ul>
          <div class="panel-body tab-content">
            <div class="tab-pane active" id="tab-principal">
              @if (! empty(Session::get('message')))
              <div class="row">
                <center>
                  <div class="alert alert-success">
                    {{Session::get('message')}}
                  </div>
                </center>
              </div>
              @endif
              <form action="{{ URL::to('plataforma/editar-configuracion') }}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Nombre organización</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->nombre }}" name="nombre" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Descripción</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->descripcion }}" name="organizacion" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Logo corporativo</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="file" value="" name="logo" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Email principal</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->email }}" name="email" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Teléfono principal</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="" name="{{ $configuracion->telefono }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Teléfono secundario</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="" name="{{ $configuracion->telefono_secundario }}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Información</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <textarea class="form-control" name="informacion">{{ $configuracion->informacion }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Última modificación</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <h6>{{ $configuracion->updated_at }}</h6>
                    </div>
                  </div>
                </div>
                <input type="submit" class="btn btn-success" value="Editar configuración" />
              </form>
            </div>
            <div class="tab-pane" id="tab-horas">
              ....
            </div>
            <div class="tab-pane" id="tab-mensajes">
              ....
            </div>

          </div>
        </div>
      </div>
      <div class="panel-footer">

      </div>
    </div>
  </form>
</div>
</div>

@stop
