<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
      content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title> Halaman Admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}"> -->
    <!-- Custom CSS -->
    <link href="{{ asset('admin/plugins/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/style.min.css') }}" rel="stylesheet">
    <![endif]-->
  </head>
  <body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    
      @include('admin.includes.navbar')

      @include('admin.includes.sidebar')
      
      <div class="page-wrapper">
        @yield('content')
      </div>
      
      @include('admin.includes.footer')
     
    </div>
   
  <script src="{{ asset('admin/plugins/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="{{ asset('admin/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/js/app-style-switcher.js') }}"></script>
  <!--Wave Effects -->
  <script src="{{ asset('admin/js/waves.js') }}"></script>
  <!--Menu sidebar -->
  <script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
  <!--Custom JavaScript -->
  <script src="{{ asset('admin/js/custom.js') }}"></script>
  <!--This page JavaScript -->
  <!--flot chart-->
  <script src="{{ asset('admin/plugins/flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('admin/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
  <script src="{{ asset('admin/js/pages/dashboards/dashboard1.js') }}"></script>
</body>
</html>