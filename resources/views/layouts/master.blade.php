<!DOCTYPE html>
<html lang="es">
<head>
  <!-- META SECTION -->
  <title>Reserva de horas - @yield('title')</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" type="text/css" id="theme" href="{{ URL::asset('css/theme-default.css') }}"/>
  <!-- EOF CSS INCLUDE -->
</head>
<body>
  <!-- START PAGE CONTAINER -->
  <div class="page-container">

    <!-- START PAGE SIDEBAR -->
    @include('layouts.sidebar')
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

      <!-- START X-NAVIGATION VERTICAL -->
      @include('layouts.navbar')
      <!-- END BREADCRUMB -->

      <!-- PAGE CONTENT WRAPPER -->
      <div class="page-content-wrap">
        @yield('content')

      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
  </div>
  <!-- END PAGE CONTAINER -->

  <!-- MESSAGE BOX-->
  <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
      <div class="mb-middle">
        <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>Sesión</strong> ?</div>
        <div class="mb-content">
          <p>Está seguro de cerrar sesión?</p>
          <p>Por favor, confirme su opción</p>
        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <a href="{{ URL::to('plataforma/login') }}" class="btn btn-success btn-lg">Si</a>
            <button class="btn btn-default btn-lg mb-control-close">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END MESSAGE BOX-->

  <!-- START PRELOADS -->
  <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
  <!-- END PRELOADS -->

  <!-- START SCRIPTS -->
  <!-- START PLUGINS -->
  <script type="text/javascript" src="{{ URL::asset('js/plugins/jquery/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/jquery/jquery-ui.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
  <!-- END PLUGINS -->

  <!-- START THIS PAGE PLUGINS-->
  <script type='text/javascript' src="{{ URL::asset('js/plugins/icheck/icheck.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>

  <script type="text/javascript" src="{{ URL::asset('js/plugins/morris/raphael-min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/morris/morris.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/rickshaw/d3.v3.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/rickshaw/rickshaw.min.js') }}"></script>
  <script type='text/javascript' src="{{ URL::asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script type='text/javascript' src="{{ URL::asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script type='text/javascript' src="{{ URL::asset('js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/owl/owl.carousel.min.js') }}"></script>

  <script type="text/javascript" src="{{ URL::asset('js/plugins/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>

  <script type='text/javascript' src="{{ URL::asset('js/plugins/validationengine/languages/jquery.validationEngine-en.js') }}"></script>
  <script type='text/javascript' src="{{ URL::asset('js/plugins/validationengine/jquery.validationEngine.js') }}"></script>
  <script type='text/javascript' src="{{ URL::asset('js/plugins/jquery-validation/jquery.validate.js') }}"></script>

  <script type="text/javascript" src="{{ URL::asset('js/plugins/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/plugins/fullcalendar/lang/es.js') }}"></script>

  <!-- END THIS PAGE PLUGINS-->

  <!-- START TEMPLATE -->
  <script type="text/javascript" src="{{ URL::asset('js/plugins.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/actions.js') }}"></script>

  <script type="text/javascript" src="{{ URL::asset('js/demo_dashboard.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

  <!-- END TEMPLATE -->
  <!-- END SCRIPTS -->
</body>
</html>
