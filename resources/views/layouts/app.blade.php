<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Panel')</title>

  <link rel="shortcut icon" type="image/png" href="/flexy/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/flexy/assets/css/styles.min.css" />

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
  body, html {
    margin: 0;
    padding: 0;
  }
  .body-wrapper {
    margin-top: 0 !important;
  }
</style>
</head>
<body>
  <div class="page-wrapper" id="main-wrapper"
      data-sidebar-position="fixed">

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- Main Wrapper -->
    <div class="body-wrapper">
        <div class="container-fluid">
          @yield('content')
        </div>

      <!-- Content -->
      <div class="body-wrapper-inner">
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="/flexy/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/flexy/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/flexy/assets/js/sidebarmenu.js"></script>
  <script src="/flexy/assets/js/app.min.js"></script>
  <script src="/flexy/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/flexy/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/flexy/assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
