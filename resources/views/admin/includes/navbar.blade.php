<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin6">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <a class="navbar-brand" href="index.html">
        <!-- Logo icon -->
        <b class="logo-icon">
          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
          <!-- Dark Logo icon -->
          <!-- <img src="{{ asset('admin/images/logo-icon.png') }}" alt="homepage" class="dark-logo" /> -->
        </b>
        <!--End Logo icon -->
        <!-- Logo text -->
        <span class="logo-text">
          <!-- dark Logo text -->
          <!-- <img src="{{ asset('admin/images/logo-text.png') }}" alt="homepage" class="dark-logo" /> -->
        </span>
      </a>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- toggle and nav items -->
      <!-- ============================================================== -->
      <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
      <!-- ============================================================== -->
      <!-- toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav me-auto mt-md-0 ">
       
    
      </ul>
      <ul class="navbar-nav">
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{-- @if (Auth::user()->image == null) --}}
              <img src="{{ asset('admin/images/users/5.jpg') }}" class="profile-pic me-2"  />
            {{-- @else --}}
              {{-- <img src="{{ asset('storage/'.Auth::user()->image) }}" class="profile-pic me-2"  /> --}}
            {{-- @endif --}}
            {{-- {{ Auth::user()->name }} --}}
          </a>
          <ul class="dropdown-menu show" aria-labelledby="navbarDropdown">
            <form action="/logout" method="Post">
              @csrf
              <button data-name="btnLogout" class="btn btn-danger text-white mt-4" type="submit">Log Out</button>
            </form>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>