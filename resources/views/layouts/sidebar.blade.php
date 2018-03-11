<?php
function current_page($url = '/'){
  return request()->path() == $url;
}
?>
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        @if (Auth::user()->avatar == null)
          <img src="/dist/img/user.jpg" class="img-circle" alt="User Image">
        @else  
          <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info">
          <p>
          @if (Auth::user()->social_name == null)
            {{ Auth::user()->name}}
          @else
            {{ Auth::user()->social_name}}
          @endif
          </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
  
        <li class="treeview">
          <a href="#"><i class="fa fa-map-marker"></i> <span>Ubicaciones</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route("ubicaciones")}}"><i class="fa fa-street-view" aria-hidden="true"></i> Registro de Ubicaciones</a></li>
            <li><a href="{{route("UbicacionesListar")}}"><i class="fa fa-list" aria-hidden="true"></i> Listado de Ubicaciones</a></li>
          </ul>
        </li>
      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>