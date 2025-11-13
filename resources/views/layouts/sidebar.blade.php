<aside class="left-sidebar">
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="text-nowrap logo-img">
        <img src="/flexy/assets/images/logos/logo.svg" alt="Logo" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-6"></i>
      </div>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
          <span class="hide-menu">Home</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ url('/') }}" aria-expanded="false">
            <i class="ti ti-atom"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="nav-small-cap">
          <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
          <span class="hide-menu">Apps</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('classrooms.index') }}" aria-expanded="false">
            <i class="ti ti-school"></i>
            <span class="hide-menu">Data Kelas</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="#" aria-expanded="false">
            <i class="ti ti-user-circle"></i>
            <span class="hide-menu">Data Guru</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="#" aria-expanded="false">
            <i class="ti ti-users"></i>
            <span class="hide-menu">Data Siswa</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="#" aria-expanded="false">
            <i class="ti ti-building"></i>
            <span class="hide-menu">Data Perusahaan</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="#" aria-expanded="false">
            <i class="ti ti-clipboard-list"></i>
            <span class="hide-menu">Data PKL</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
