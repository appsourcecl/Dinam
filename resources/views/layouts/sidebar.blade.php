<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="index.html">Dinam</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <br>
                <br>
            </a>
            <div class="profile">
                <div class="profile-data">
                    <div class="profile-data-name">{{ ucwords(Session::get('nombreUsuario'))." ".ucwords(Session::get('apellidoUsuario')) }}</div>
                    <div class="profile-data-title">Administrador</div>
                </div>
            </div>
        </li>
        <li class="xn-title">Menú de navegación</li>
        <li>
            <a href="{{ URL::to('plataforma/principal') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Inicio</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-clock-o"></span> <span class="xn-text">Horas</span></a>
            <ul>
                <li><a href="{{ URL::to('hora/ver-horas') }}"><span class="fa fa-calendar"></span> Calendario</a></li>
                <li><a href="{{ URL::to('hora/ver-horas-listado') }}"><span class="fa fa fa-list"></span> Listado</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ URL::to('paciente/ver-pacientes') }}"><span class="fa fa-users"></span> <span class="xn-text">Pacientes</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-user-md"></span> <span class="xn-text">Profesionales</span></a>
            <ul>
                <li><a href="{{ URL::to('profesional/ver-profesionales') }}"><span class="fa fa-eye"></span> Ver profesionales</a></li>
                <li><a href="{{ URL::to('especialidad/ver-especialidades') }}"><span class="fa fa fa-stethoscope"></span> Ver especialidades</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-hospital-o"></span> <span class="xn-text">Organización </span></a>
            <ul>
                <li><a href="{{ URL::to('mensaje/ver-mensajes') }}"><span class="fa fa-comments-o"></span> Mensajería interna</a></li>
                <li><a href="{{ URL::to('mensaje/ver-mensajes') }}"><span class="fa fa-comment-o"></span> Mensajería clientes</a></li>
            </ul>
        </li>
        <li>
          <br>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Configuración </span></a>
            <ul>
                <li><a href="{{ URL::to('administrador/ver-administradores') }}"><span class="fa fa-eye"></span> Ver administradores</a></li>
                <li><a href="{{ URL::to('plataforma/configuracion') }}"><span class="fa fa-cog"></span> Configuración web </a></li>
                <li><a target="_blank" href="{{ URL::to('/') }}"><span class="fa fa-file-image-o"></span> Visitar web </a></li>
            </ul>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
