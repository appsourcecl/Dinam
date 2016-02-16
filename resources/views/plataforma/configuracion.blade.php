@extends('layouts.master')
@section('title', $title )

@section('content')

<meta http-equiv="Cache-Control" content="no-store" />

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading ui-draggable-handle">
        <div class="panel-title">
          <h3>Configuración para el sitio web</h3>
        </div>
        <ul class="panel-controls panel-controls-title">
          <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <div class="panel panel-default tabs">
          <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="#tab-principal" role="tab" data-toggle="tab" aria-expanded="true">Principal</a></li>
            <li class=""><a href="#tab-horas" role="tab" data-toggle="tab" aria-expanded="false">Información sitio web</a></li>
            <li class=""><a href="#tab-plantilla" role="tab" data-toggle="tab" aria-expanded="false">Plantilla, diseño e imágenes</a></li>
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
              <center>
                <span class="label label-info">Instructivo</span> La información ingresada sirve para ser mostrada en el sitio web de su organización.
              </center>
              <br>
              <form action="{{ URL::to('plataforma/editar-configuracion') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

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
                  <center>
                    <img style="width:200px" src="{{ URL::to('sitio/logo.png') }}">
                  </center>
                  <br>
                  <label class="col-md-3 col-xs-12 control-label">Logo corporativo <br> (trasparente .png)</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="file" value="" name="logo" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Dirección</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->direccion }}" name="direccion" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Comuna</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->comuna }}" name="comuna" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Ciudad</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->ciudad }}" name="ciudad" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Pais</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->pais }}" name="pais" class="form-control">
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
                      <input type="text" value="{{ $configuracion->telefono }}" name="telefono" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Teléfono secundario</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->telefono_secundario }}" name="telefono_secundario" class="form-control">
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
              @if (! empty(Session::get('message_web')))
              <div class="row">
                <center>
                  <div class="alert alert-success">
                    {{Session::get('message_web')}}
                  </div>
                </center>
              </div>
              @endif
              <center>
                <span class="label label-info">Instructivo</span> La información ingresada sirve para ser mostrada en el sitio web de su organización.
              </center>
              <br>
              <form action="{{ URL::to('plataforma/editar-configuracion-web') }}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Descripción</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->descripcion }}" name="descripcion" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Servicio</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->texto_servicio }}" name="texto_servicio" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Nosotros</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->texto_nosotros }}" name="texto_nosotros" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Nosotros (texto)</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group col-md-12">
                      <textarea name="texto_nosotros_informacion" class="form-control" rows="5">{{ $configuracion->texto_nosotros_informacion }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Infraestructura</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->texto_infraestructura }}" name="texto_infraestructura" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Equipo</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->texto_equipo }}" name="texto_equipo" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Contacto</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                      <input type="text" value="{{ $configuracion->texto_contacto }}" name="texto_contacto" class="form-control">
                    </div>
                  </div>
                </div>
                <input type="submit" class="btn btn-success" value="Editar configuración para sitio web" />
              </form>
            </div>
            <div class="tab-pane" id="tab-plantilla">
              <center>
                <span class="label label-info">Instructivo</span> La información ingresada sirve para ser mostrada en el sitio web de su organización.
              </center>
              <div style="text-align:center;" class="col-md-3 col-xs-12">
                <input checked style="width:50px"  type="radio" name="id_plantilla" value="1" >
                <br><br>
                <img style="width:200px" src="{{ URL::to('img/configuracion/doctor.jpg') }}">
                <br><br>
                <h5>
                  Doctor template
                </h5>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <hr>
                  <div id="doctor_template" class="template">
                    <h4>
                      Doctor template
                    </h4>
                    <br>
                    @if (! empty(Session::get('message_web_doctor')))
                    <div class="row">
                      <center>
                        <div class="alert alert-success">
                          {{Session::get('message_web_doctor')}}
                        </div>
                      </center>
                    </div>
                    @endif
                    <form action="{{ URL::to('plataforma/editar-configuracion-web-doctor') }}"   method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <table class="table table-bordered table-condensed">
                        <tr>
                          <td>
                            Banner (.jpg 1982x890)
                            <br>
                            <input type="file" name="banner-bg">
                          </td>
                          <td>
                            <center>
                              <img style="width:400px" src="{{ URL::asset('plantillas/template_doctor/images/banner-bg.jpg') }}">
                            </center>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Nosotros (.png 600x400)
                            <br>
                            <input type="file" name="feature-img-1">
                          </td>
                          <td>
                            <center>
                              <img style="width:300px" src="{{ URL::asset('plantillas/template_doctor/images/feature-img-1.png') }}">
                            </center>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <table class="table table-bordered">
                              <tr>
                                <td colspan="4">
                                    Instalaciones (.jpg 800x600)
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <center>
                                    <img style="width:130px" src="{{ URL::asset('plantillas/template_doctor/images/work/1.jpg') }}">
                                    <br><br>
                                    <input type="file" name="instalacion_1">
                                  </center>
                                </td>
                                <td>
                                  <center>
                                    <img style="width:130px" src="{{ URL::asset('plantillas/template_doctor/images/work/2.jpg') }}">
                                    <br><br>
                                    <input type="file" name="instalacion_2">
                                  </center>
                                </td>
                                <td>
                                  <center>
                                    <img style="width:130px" src="{{ URL::asset('plantillas/template_doctor/images/work/3.jpg') }}">
                                    <br><br>
                                    <input type="file" name="instalacion_3">
                                  </center>
                                </td>
                                <td>
                                  <center>
                                    <img style="width:130px" src="{{ URL::asset('plantillas/template_doctor/images/work/4.jpg') }}">
                                    <br><br>
                                    <input type="file" name="instalacion_4">
                                  </center>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <center>
                                    <img style="width:130px" src="{{ URL::asset('plantillas/template_doctor/images/work/5.jpg') }}">
                                    <br><br>
                                    <input type="file" name="instalacion_5">
                                  </center>
                                </td>
                                <td>
                                  <center>
                                    <img style="width:130px" src="{{ URL::asset('plantillas/template_doctor/images/work/6.jpg') }}">
                                    <br><br>
                                    <input type="file" name="instalacion_6">
                                  </center>
                                </td>
                                <td>
                                  <center>
                                    <img style="width:130px" src="{{ URL::asset('plantillas/template_doctor/images/work/7.jpg') }}">
                                    <br><br>
                                    <input type="file" name="instalacion_7">
                                  </center>
                                </td>
                                <td>
                                  <center>
                                    <img style="width:130px" src="{{ URL::asset('plantillas/template_doctor/images/work/8.jpg') }}">
                                    <br><br>
                                    <input type="file" name="instalacion_8">
                                  </center>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <input class="btn btn-success" type="submit" value="Modificar imágenes">
                          </td>
                        </tr>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
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
<script>

public

</script>


@stop
