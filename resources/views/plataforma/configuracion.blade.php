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
              <form action="{{ URL::to('principal/editar-configuracion') }}" method="post" class="form-horizontal">
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Nombre organización</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="" name="organizacion" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Descripción</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="" name="organizacion" class="form-control">
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
                  <label class="col-md-3 col-xs-12 control-label">Correo principal</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="" name="email" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Teléfono principal</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="" name="telefono" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Teléfono secundario</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="" name="telefono_secundario" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Información</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <textarea class="form-control" name="informacion"></textarea>
                    </div>
                  </div>
                </div>
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
        <input type="submit" class="btn btn-success" value="Editar profesional" />
      </div>
    </div>
  </form>
</div>
</div>

@stop
