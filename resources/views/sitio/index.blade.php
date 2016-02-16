<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!--[if lt IE 9]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <![endif]-->
  <title>{{ $title }}</title>
  <meta name="description" content="Centro medico,medico, clinica, clinica privada, hospital, resfrio, clinico, enfermedad, horas medicas, tomar hora, reserva de hora, doctor, enfermero">
  <meta name="author" content="{{ $title }}">
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!--[if lte IE 8]>
  <script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="{{ URL::asset('plantillas/template_doctor/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('plantillas/template_doctor/css/isotope.css') }}" media="screen" />
  <link rel="stylesheet" href="{{ URL::asset('plantillas/template_doctor/js/fancybox/jquery.fancybox.css') }}" type="text/css" media="screen" />
  <link href="{{ URL::asset('plantillas/template_doctor/css/animate.css') }}" rel="stylesheet" media="screen">
  <!-- Owl Carousel Assets -->
  <link href="{{ URL::asset('plantillas/template_doctor/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::asset('plantillas/template_doctor/css/styles.css') }}" />
  <!-- Font Awesome -->
  <link href="{{ URL::asset('plantillas/template_doctor/font/css/font-awesome.min.css') }}" rel="stylesheet">
</head>

<body>
  <header class="header">
    <div class="container">
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft" style="padding:10px;margin:20px;"><img style="width:160px" src="sitio/logo.png"></a> </div>
          <!--/.navbar-header-->
          <div id="main-nav" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="mainNav">
              <li class="active" id="firstLink"><a href="#home" class="scroll-link">Inicio</a></li>
              <li><a href="#services" class="scroll-link">Servicios</a></li>
              <li><a href="#aboutUs" class="scroll-link">Nosotros</a></li>
              <li><a href="#team" class="scroll-link">Equipo</a></li>
              <li><a href="#contactUs" class="scroll-link">Contáctenos</a></li>
              <li><a href="{{ URL::asset('sitio/reservar-hora') }}" class="scroll-link">Reservar hora</a></li>
            </ul>
          </div>
          <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
      </div>
      <!--/.container-->
    </header>
    <!--/.header-->
    <div id="#top"></div>
    <section id="home">
      <div class="banner-container"> <img src="{{ URL::asset('plantillas/template_doctor/images/banner-bg.jpg') }}" alt="banner" />
        <div class="container banner-content">
          <div class="hero-text animated fadeInDownBig">
            <h1 class="responsive-headline" style="font-size: 40px;">{{ $configuracion->descripcion }}</h1>
            <a href="#basics" class="arrow-link"> <i class="fa fa-arrow-circle-down fa-2x"></i> </a>
            <!--<p>Awesome theme for your Business or Corporate site to showcase <br/>
            your product and service.</p>-->
          </div>
        </div>
      </div>
    </section>
    <section id="services" class="page-section colord">
      <div class="container">
        <div class="heading text-center">
          <!-- Heading -->
          <h2>Nuestros servicios</h2>
          <p>{{ $configuracion->texto_servicio }}</p>
        </div>
        <div class="row">
          <!-- item -->
          <div class="col-md-3 text-center c1"> <i class="fa fa-life-ring fa-2x circle"></i>
            <h3><span class="id-color">Cardio Monitoring</span></h3>
            <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer elit imperdiet congue.</p>
          </div>
          <!-- end: -->

          <!-- item -->
          <div class="col-md-3 text-center c2"> <i class="fa fa-plus-square fa-2x circle"></i>
            <h3><span class="id-color">Medical Treatment</span></h3>
            <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer elit imperdiet congue.</p>
          </div>
          <!-- end: -->

          <!-- item -->
          <div class="col-md-3 text-center c1"> <i class="fa fa-female fa-2x circle"></i>
            <h3><span class="id-color">Women Care Help</span></h3>
            <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer ultricies sed elit impe.</p>
          </div>
          <!-- end: -->

          <!-- item -->
          <div class="col-md-3 text-center c2"> <i class="fa fa-child fa-2x circle"></i>
            <h3><span class="id-color">Child Care</span></h3>
            <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer elit imperdiet conempus.</p>
          </div>
          <!-- end:-->
        </div>
      </div>
      <!--/.container-->
    </section>
    <section id="aboutUs">
      <div class="container">
        <div class="heading text-center">
          <!-- Heading -->
          <h2>Nosotros</h2>
          <p>
            {{ $configuracion->texto_nosotros }}
          </p>
        </div>
        <div class="row feature design">
          <div class="six columns right">
            <p>
              {{ $configuracion->texto_nosotros_informacion }}
            </p>
          </div>
          <div class="six columns feature-media left"> <img src="{{ URL::asset('plantillas/template_doctor/images/feature-img-1.png') }}" alt=""> </div>
        </div>
      </div>
    </section>
    <section id="work" class="page-section page">
      <div class="container text-center">
        <div class="heading">
          <h2>Nuestras instalaciones</h2>
          <p>
            {{ $configuracion->infraestructura }}
          </p>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div id="portfolio">
              <ul class="items list-unstyled clearfix animated fadeInRight showing" data-animation="fadeInRight" style="position: relative; height: 438px;">
                <li class="item branding" style="position: absolute; left: 0px; top: 0px;"> <a href="images/work/1.jpg" class="fancybox"> <img src="{{ URL::asset('plantillas/template_doctor/images/work/1.jpg') }}" alt="">
                  <div class="overlay"> <span>Etiam porta</span> </div>
                </a> </li>
                <li class="item photography" style="position: absolute; left: 292px; top: 0px;"> <a href="{{ URL::asset('plantillas/template_doctor/images/work/2.jpg') }}" class="fancybox"> <img src="{{ URL::asset('plantillas/template_doctor/images/work/2.jpg') }}" alt="">
                  <div class="overlay"> <span>Lorem ipsum</span> </div>
                </a> </li>
                <li class="item branding" style="position: absolute; left: 585px; top: 0px;"> <a href="images/work/3.jpg" class="fancybox"> <img src="{{ URL::asset('plantillas/template_doctor/images/work/3.jpg') }}" alt="">
                  <div class="overlay"> <span>Vivamus quis</span> </div>
                </a> </li>
                <li class="item photography" style="position: absolute; left: 877px; top: 0px;"> <a href="images/work/4.jpg" class="fancybox"> <img src="{{ URL::asset('plantillas/template_doctor/images/work/4.jpg') }}" alt="">
                  <div class="overlay"> <span>Donec ac tellus</span> </div>
                </a> </li>
                <li class="item photography" style="position: absolute; left: 0px; top: 219px;"> <a href="images/work/5.jpg" class="fancybox"> <img src="{{ URL::asset('plantillas/template_doctor/images/work/5.jpg') }}" alt="">
                  <div class="overlay"> <span>Etiam volutpat</span> </div>
                </a> </li>
                <li class="item web" style="position: absolute; left: 292px; top: 219px;"> <a href="images/work/6.jpg" class="fancybox"> <img src="{{ URL::asset('plantillas/template_doctor/images/work/6.jpg') }}" alt="">
                  <div class="overlay"> <span>Donec congue </span> </div>
                </a> </li>
                <li class="item photography" style="position: absolute; left: 585px; top: 219px;"> <a href="images/work/7.jpg" class="fancybox"> <img src="{{ URL::asset('plantillas/template_doctor/images/work/7.jpg') }}" alt="">
                  <div class="overlay"> <span>Nullam a ullamcorper diam</span> </div>
                </a> </li>
                <li class="item web" style="position: absolute; left: 877px; top: 219px;"> <a href="images/work/8.jpg" class="fancybox"> <img src="{{ URL::asset('plantillas/template_doctor/images/work/8.jpg') }}" alt="">
                  <div class="overlay"> <span>Etiam consequat</span> </div>
                </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="team" class="page-section">
      <div class="container">
        <div class="heading text-center">
          <!-- Heading -->
          <h2>Nuestro equipo</h2>
          <p>
            {{ $configuracion->texto_equipo }}
          </p>
        </div>
        <!-- Team Member's Details -->
        <div class="team-content">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
              <!-- Team Member -->
              <div class="team-member pDark">
                <!-- Image Hover Block -->
                <div class="member-img">
                  <!-- Image  -->
                  <img class="img-responsive" src="{{ URL::asset('plantillas/template_doctor/images/photo-1.jpg') }}" alt=""> </div>
                  <!-- Member Details -->
                  <h4>John Doe</h4>
                  <!-- Designation -->
                  <span class="pos">CEO</span> </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  <!-- Team Member -->
                  <div class="team-member pDark">
                    <!-- Image Hover Block -->
                    <div class="member-img">
                      <!-- Image  -->
                      <img class="img-responsive" src="{{ URL::asset('plantillas/template_doctor/images/photo-2.jpg') }}" alt=""> </div>
                      <!-- Member Details -->
                      <h4>Larry Doe</h4>
                      <!-- Designation -->
                      <span class="pos">Art Director</span> </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <!-- Team Member -->
                      <div class="team-member pDark">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                          <!-- Image  -->
                          <img class="img-responsive" src="{{ URL::asset('plantillas/template_doctor/images/photo-3.jpg') }}" alt=""> </div>
                          <!-- Member Details -->
                          <h4>Ranith Kays</h4>
                          <!-- Designation -->
                          <span class="pos">Manager</span> </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                          <!-- Team Member -->
                          <div class="team-member pDark">
                            <!-- Image Hover Block -->
                            <div class="member-img">
                              <!-- Image  -->
                              <img class="img-responsive" src="{{ URL::asset('plantillas/template_doctor/images/photo-4.jpg') }}" alt=""> </div>
                              <!-- Member Details -->
                              <h4>Joan Ray</h4>
                              <!-- Designation -->
                              <span class="pos">Creative</span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/.container-->
                    </section>
                    <section id="contactUs" class="contact-parlex">
                      <div class="parlex-back">
                        <div class="container">
                          <div class="row">
                            <div class="heading text-center">
                              <!-- Heading -->
                              <h2>Contáctenos</h2>
                              <p>
                                  {{ $configuracion->texto_contacto }}
                              </p>
                            </div>
                          </div>
                          <div class="row mrgn30">
                            <form method="post" action="" id="contactfrm" role="form">
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="name">Nombre</label>
                                  <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese su nombre" title="Please enter your name (at least 2 characters)">
                                </div>
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su e-mail" title="Please enter a valid email address">
                                  <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Enviar mensaje</button>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="comments">Comentarios</label>
                                  <textarea name="comment" class="form-control" id="comments" cols="3" rows="5" placeholder="Ingrese su mensaje…" title="Please enter your message (at least 10 characters)"></textarea>
                                </div>
                                <div class="result"></div>
                              </div>
                            </form>
                            <div class="col-sm-4">
                              <h4>Dirección:</h4>
                              <address>
                                {{ $configuracion->direccion }}, {{ $configuracion->comuna }}<br>
                                {{ $configuracion->ciudad }}, {{ $configuracion->pais }}<br>
                              </address>
                              <h4>Teléfono:</h4>
                              <address>
                                {{ $configuracion->telefono }}<br>
                                {{ $configuracion->telefono_secundario }}
                              </address>
                              <h4>E-mail:</h4>
                              <address>
                                {{ $configuracion->email }}<br>
                              </address>
                            </div>
                          </div>
                        </div>
                        <div class="container">
                          <div class="social text-center">
                            <a href="#">
                              <i class="fa fa-facebook"></i>
                            </a>
                          </div>
                          <!--CLEAR FLOATS-->
                        </div>
                        <!--/.container-->
                      </div>
                    </section>
                    <!--/.page-section-->
                    <section class="copyright">
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-12 text-center"> Copyright 2016 | Todos los derechos reservados </div>
                        </div>
                        <!-- / .row -->
                      </div>
                    </section>
                    <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

                    <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
                    <script src="{{ URL::asset('plantillas/template_doctor/js/modernizr-latest.js') }}"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/jquery-1.8.2.min.js') }}" type="text/javascript"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/bootstrap.min.js') }}" type="text/javascript"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/jquery.isotope.min.js') }}" type="text/javascript"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/fancybox/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/jquery.nav.js') }}" type="text/javascript"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/jquery.fittext.js') }}"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/waypoints.js') }}"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/custom.js') }}" type="text/javascript"></script>
                    <script src="{{ URL::asset('plantillas/template_doctor/js/owl-carousel/owl.carousel.js') }}"></script>
                  </body>
                  </html>
