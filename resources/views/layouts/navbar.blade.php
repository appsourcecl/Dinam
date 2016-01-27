<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
  <!-- TOGGLE NAVIGATION -->
  <li class="xn-icon-button">
    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
  </li>
  <!-- END TOGGLE NAVIGATION -->
  <!-- SEARCH -->
  <li class="xn-search">
    <form role="form">
      <input type="text" name="search" placeholder="Search..."/>
    </form>
  </li>
  <!-- END SEARCH -->
  <!-- SIGN OUT -->
  <li class="xn-icon-button pull-right">
    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
  </li>
  <!-- END SIGN OUT -->
  <!-- MESSAGES -->
  <li class="xn-icon-button pull-right">
    <a href="#"><span class="fa fa-comments"></span></a>
    <div class="informer informer-danger">4</div>
    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>
        <div class="pull-right">
          <span class="label label-danger">4 new</span>
        </div>
      </div>
      <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
        <a href="#" class="list-group-item">
          <div class="list-group-status status-online"></div>
          <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
          <span class="contacts-title">John Doe</span>
          <p>Praesent placerat tellus id augue condimentum</p>
        </a>
        <a href="#" class="list-group-item">
          <div class="list-group-status status-away"></div>
          <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
          <span class="contacts-title">Dmitry Ivaniuk</span>
          <p>Donec risus sapien, sagittis et magna quis</p>
        </a>
        <a href="#" class="list-group-item">
          <div class="list-group-status status-away"></div>
          <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
          <span class="contacts-title">Nadia Ali</span>
          <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
        </a>
        <a href="#" class="list-group-item">
          <div class="list-group-status status-offline"></div>
          <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
          <span class="contacts-title">Darth Vader</span>
          <p>I want my money back!</p>
        </a>
      </div>
      <div class="panel-footer text-center">
        <a href="pages-messages.html">Show all messages</a>
      </div>
    </div>
  </li>
  <!-- END MESSAGES -->
  <!-- TASKS -->
  <li class="xn-icon-button pull-right">
    <a href="#"><span class="fa fa-tasks"></span></a>
    <div class="informer informer-warning">3</div>
    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>
        <div class="pull-right">
          <span class="label label-warning">3 active</span>
        </div>
      </div>
      <div class="panel-body list-group scroll" style="height: 200px;">
        <a class="list-group-item" href="#">
          <strong>Phasellus augue arcu, elementum</strong>
          <div class="progress progress-small progress-striped active">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
          </div>
          <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
        </a>
        <a class="list-group-item" href="#">
          <strong>Aenean ac cursus</strong>
          <div class="progress progress-small progress-striped active">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
          </div>
          <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
        </a>
        <a class="list-group-item" href="#">
          <strong>Lorem ipsum dolor</strong>
          <div class="progress progress-small progress-striped active">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
          </div>
          <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
        </a>
        <a class="list-group-item" href="#">
          <strong>Cras suscipit ac quam at tincidunt.</strong>
          <div class="progress progress-small">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
          </div>
          <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
        </a>
      </div>
      <div class="panel-footer text-center">
        <a href="pages-tasks.html">Show all tasks</a>
      </div>
    </div>
  </li>
  <!-- END TASKS -->
</ul>
<!-- END X-NAVIGATION VERTICAL -->

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="#">Plataforma</a></li>
  <li class="active">@yield('title')</li>
</ul>
