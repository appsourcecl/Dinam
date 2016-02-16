<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
  <!-- META SECTION -->
  <title>Reserva de horas - {{ $title }}</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link href="{{ URL::asset('css/theme-default.css') }}" rel="stylesheet" type="text/css" >
  <link href="css/theme-default.css" rel="stylesheet">

  <!-- EOF CSS INCLUDE -->
</head>
<body>

  <div class="login-container">

    <div class="login-box animated fadeInDown">

      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <center>
        <img style="width:200px" src="{{ URL::to('sitio/logo.png') }}">
      </center>
      <br>
      <div class="login-body">
        <div class="login-title"><strong>Bienvenido</strong>, inicio de sesión</div>
        <form action="logear" class="form-horizontal" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <div class="col-md-12">
              <input type="text" class="form-control" name="email" placeholder="Email"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <input type="password" class="form-control" name="password" placeholder="Password"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <button class="btn btn-info btn-block">Ingresar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="login-footer">
        <div class="pull-left">
          &copy; 2014 Reserva de horas
        </div>

      </div>
    </div>

  </div>

</body>
</html>
