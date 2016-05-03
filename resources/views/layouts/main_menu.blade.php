<!-- sidebar -->
<div class="sidebar app-aside" id="sidebar">
  <div class="sidebar-container perfect-scrollbar">
    <nav>
  
      <!-- start: MAIN NAVIGATION MENU -->
      <div class="navbar-title">
        <span>Menú de Navegación</span>
      </div>
      <ul class="main-navigation-menu">
        <li>
          <a href="{{ url('/home') }}">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-home"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Inicio </span>
              </div>
            </div>
          </a>
        </li>
        
        <li>
          <a href="{!! route('inventarios.index') !!}">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Inventario </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="{!! route('items.index') !!}">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Items </span>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="#!">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Productos </span>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="{!! route('compras.index') !!}">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Compras </span>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="{!! route('proveedores.index') !!}">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Proveedores </span>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="#!">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Reportes Financieros </span>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="#!">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Caja </span>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="{!! route('usuarios.index') !!}">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Usuarios </span>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="{!! route('configuraciones.index') !!}">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-location-pin"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Configuraciones </span>
              </div>
            </div>
          </a>
        </li>

      </ul>
      <!-- end: MAIN NAVIGATION MENU -->
      
    </nav>
  </div>
</div>
<!-- / sidebar -->