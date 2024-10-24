<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
  <div class="container-xxl d-flex h-100">
    <ul class="menu-inner">
      <!-- Dashboards -->
      {{--  <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboards">Dashboard</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('dashboard')}}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
              <div data-i18n="Inicio">Inicio</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="dashboards-crm.html" class="menu-link">
              <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
              <div data-i18n="CRM">CRM</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="dashboards-ecommerce.html" class="menu-link">
              <i class="menu-icon tf-icons ti ti-atom-2"></i>
              <div data-i18n="eCommerce">eCommerce</div>
            </a>
          </li>
        </ul>
      </li>  --}}
      <!-- Dashboards -->
      <li class="menu-item">
        <a href="{{route('dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
      </li>
      <!-- Layouts -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-dashboard"></i>
          <div data-i18n="Administración">Administraci&oacute;n</div>
        </a>

        <ul class="menu-sub">
          <!-- Srvicios -->
          <li class="menu-item">
            <a href="{{route('Servicios.index')}}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-settings text-secondary"></i>
              <div data-i18n="Servicios">Servicios</div>
            </a>
          </li>
          <!-- Especialidades -->
          <li class="menu-item">
            <a href="{{route('Especialidades.index')}}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-medical-cross text-danger"></i>
              <div data-i18n="Especialidades">Especialidades</div>
            </a>
          </li>
          <!-- Pacientes -->
          <li class="menu-item">
            <a href="{{route('Pacientes.index')}}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-user text-primary"></i>
              <div data-i18n="Pacientes">Pacientes</div>
            </a>
          </li>
          {{--  <li class="menu-item">
            <a href="layouts-container.html" class="menu-link">
              <i class="menu-icon tf-icons ti ti-arrows-maximize"></i>
              <div data-i18n="Container">Container</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-blank.html" class="menu-link">
              <i class="menu-icon tf-icons ti ti-square"></i>
              <div data-i18n="Blank">Blank</div>
            </a>
          </li>  --}}
        </ul>
      </li>
    

      {{--  <!-- Srvicios -->
      <li class="menu-item">
        <a href="{{route('Servicios.index')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-settings text-secondary"></i>
          <div data-i18n="Servicios">Servicios</div>
        </a>
      </li>

      <!-- Especialidades -->
      <li class="menu-item">
        <a href="{{route('Especialidades.index')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-medical-cross text-danger"></i>
          <div data-i18n="Especialidades">Especialidades</div>
        </a>
      </li>
      <!-- Pacientes -->
      <li class="menu-item">
        <a href="{{route('Pacientes.index')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-user text-primary"></i>
          <div data-i18n="Pacientes">Pacientes</div>
        </a>
      </li>  --}}

    </ul>
  </div>
</aside>
<!-- / Menu -->
