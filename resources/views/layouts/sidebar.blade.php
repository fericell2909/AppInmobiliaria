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
      

      <!-- Administrador -->
      @if (Auth::user()->rol_id == 1)  
        <li class="treeview">
            <a href="#"><i class="fa fa-edit"></i> <span>Mantenedores</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              
              <li><a href="{{ route("nivelinstitucion")}}"><i class="fa fa-university" aria-hidden="true"></i> Nivel de Institución </a></li>
              <li><a href="{{ route("caracteristicainstitucion")}}"><i class="fa fa-inbox" aria-hidden="true"></i> Caracteristicas de Institución </a></li>
              <li><a href="{{ route("modalidadinstitucion")}}"><i class="fa fa-share-alt" aria-hidden="true"></i> Modalidad de Institución </a></li>

              <li><a href="{{ route("aliadoestrategico")}}"><i class="fa fa-shield" aria-hidden="true"></i> Aliados Estrategicos </a></li>
              <li><a href="{{ route("condicionlaboral")}}"><i class="fa fa-balance-scale" aria-hidden="true"></i> Condicion Laboral</a></li>
              <li><a href="{{ route("musuarios")}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Usuarios</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#"><i class="fa fa-asterisk" aria-hidden="true"></i> <span>M. Encuestas</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">

              <li><a href="{{ route("preguntas")}}"><i class="fa fa-question-circle" aria-hidden="true"></i> Preguntas </a></li>
              <li><a href="{{ route("productos")  }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> Productos </a></li>
              <li><a href="{{ route("actividades")  }}"><i class="fa fa-tasks" aria-hidden="true"></i> Actividades </a></li>
              <li><a href="{{ route("codigosfases") }}"><i class="fa fa-code-fork" aria-hidden="true"></i> Codigos de Fase</a></li>
              <li><a href="{{ route("fases") }}"><i class="fa fa-columns" aria-hidden="true"></i> Fases</a></li>
              <li><a href="{{ route("modeloencuestas") }}"><i class="fa fa-braille" aria-hidden="true"></i> Encuestas </a></li>
            </ul>
        </li>

         <li class="treeview">
          <a href="#"><i class="fa fa-map-marker"></i> <span>Fichas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route("ubicaciones")}}"><i class="fa fa-street-view" aria-hidden="true"></i> Registro de Fichas</a></li>
            <li><a href="{{route("UbicacionesListar")}}"><i class="fa fa-list" aria-hidden="true"></i> Listado de Fichas</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-list"></i> <span>Listados</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route("UsuariosListar")}}"><i class="fa fa-user" aria-hidden="true"></i> Listado de Usuarios</a></li>
            <li><a href="{{route("MonedasListar")}}"><i class="fa fa-money" aria-hidden="true"></i> Listado de Monedas</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-database"></i> <span>Reportes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route("ReportedeUsuarios")}}"><i class="fa fa-user" aria-hidden="true"></i> Reporte de Usuarios</a></li>
            <li><a href="{{route("ReportedeUbicaciones")}}"><i class="fa fa-map-marker" aria-hidden="true"></i> Reporte de Fichas</a></li>
          </ul>
        </li>
      @endif

      <!-- Supervisor -->
      @if (Auth::user()->rol_id == 2)  
        <li class="treeview">
          <a href="#"><i class="fa fa-map-marker"></i> <span>Fichas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route("UbicacionesListar")}}"><i class="fa fa-list" aria-hidden="true"></i> Consultar Fichas</a></li>
          </ul>
        </li>
      @endif

      <!-- Coordinador Regional o Coordinador Local -->
      @if (Auth::user()->rol_id == 3 || Auth::user()->rol_id == 4)  
        <li class="treeview">
          <a href="#"><i class="fa fa-map-marker"></i> <span>Fichas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route("ubicaciones")}}"><i class="fa fa-street-view" aria-hidden="true"></i> Registro de Fichas</a></li>
          </ul>
        </li>
      @endif

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>