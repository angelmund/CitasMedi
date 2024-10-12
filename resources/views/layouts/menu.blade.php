<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ url('/assets/img/upx/UPX-logo.png') }}" class="img-fluid inline-block" alt="UPX"
          style=" max-width: 18px;">
      </span>
      <span class="app-brand-text demo menu-text fw-bold">Sistema</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon fa-solid fa-house"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>
    <!--- ADMINISTRACIÓN -->
    <li class="menu-item {{ request()->routeIs('usuarios.index') ? 'active' : '' }}">
      <a href="{{ route('Servicios.index') }}" class="menu-link">
        <i class="menu-icon fa-solid fa-users"></i>
        <div data-i18n="Usuarios">Usuarios</div>
      </a>
    </li>
    
    <!--- TERMINA ADMINISTRACIÓN -->

  </ul>
</aside>