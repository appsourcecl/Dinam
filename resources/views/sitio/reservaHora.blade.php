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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
  <header class="header">
    <div class="container">
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft" style="padding:10px;margin:20px;"><img style="width:160px" src="{{ URL::asset('sitio/logo.png') }}"></a> </div>
          <!--/.navbar-header-->
          <div id="main-nav" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="mainNav">
              <li class="active" id="firstLink"><a href="#home" class="scroll-link">Inicio</a></li>
              <li><a href="#services" class="scroll-link">Servicios</a></li>
              <li><a href="#aboutUs" class="scroll-link">Nosotros</a></li>
              <li><a href="#team" class="scroll-link">Equipo</a></li>
              <li><a href="#contactUs" class="scroll-link">Contáctenos</a></li>
              <li><a href="{{ URL::asset('sitio/reserva-hora') }}" class="scroll-link">Reservar hora</a></li>
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
      <div class="banner-container">
        <div style="heigth:500px" class="container banner-content">
          <div class="hero-text animated fadeInDownBig">
            <h1 class="responsive-headline" style="font-size: 40px;">{{ $configuracion->descripcion }}</h1>
            <a href="#basics" class="arrow-link"> <i class="fa fa-arrow-circle-down fa-2x"></i> </a>
            <!--<p>Awesome theme for your Business or Corporate site to showcase <br/>
            your product and service.</p>-->
          </div>
        </div>
      </div>
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
