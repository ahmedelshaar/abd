<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

  <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="noindex, nofollow">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Icons -->
  <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

  <!-- Fonts and Styles -->
  @yield('css_before')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
  <link rel="stylesheet" id="css-main" href="{{ asset('/css/codebase.css') }}">

  <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/corporate.css') }}"> -->
  @yield('css_after')

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>
</head>

<body>
  <!-- Page Container -->
  <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed sidebar-inverse">
    <!-- Side Overlay-->
    <aside id="side-overlay">
      <!-- Side Header -->
      <div class="content-header content-header-fullrow">
        <div class="content-header-section align-parent">
          <!-- Close Side Overlay -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
            <i class="fa fa-times text-danger"></i>
          </button>
          <!-- END Close Side Overlay -->

          <!-- User Info -->
          <div class="content-header-item">
            <a class="img-link mr-5" href="javascript:void(0)">
              <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
            </a>
            <a class="align-middle text-primary-dark font-w600" href="javascript:void(0)">John Smith</a>
          </div>
          <!-- END User Info -->
        </div>
      </div>
      <!-- END Side Header -->

      <!-- Side Content -->
      <div class="content-side">
        <p>
          Content..
        </p>
      </div>
      <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <nav id="sidebar">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
          <!-- Mini Mode -->
          <div class="content-header-section sidebar-mini-visible-b">
            <!-- Logo -->
            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
              <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
            </span>
            <!-- END Logo -->
          </div>
          <!-- END Mini Mode -->

          <!-- Normal Mode -->
          <div class="content-header-section text-center align-parent sidebar-mini-hidden">
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
              <i class="fa fa-times text-danger"></i>
            </button>
            <!-- END Close Sidebar -->

            <!-- Logo -->
            <div class="content-header-item">
                <img src="{{asset('media\logo.png')}}" class="h-100" >
            </div>
            <!-- END Logo -->
          </div>
          <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side User -->
          <div class="content-side content-side-full px-10 align-parent" style="background-color: #2d3238;">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
              <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
              <ul class="list-inline my-10">
                <li class="list-inline-item">
                  <a class=" text-dual-primary-dark font-size-sm font-w600 text-uppercase">
                      {{ Auth::user()->name }}
                  </a>
                </li>
              <li class="list-inline-item">
                  <a href="{{route('home')}}" class=" text-dual-primary-dark font-size-sm font-w600 text-uppercase">
                      <i class="si si-home"></i>
                  </a>
              </li>
                <li class="list-inline-item">
                    <a class="link-effect text-dual-primary-dark" onclick="$('#logout-form').submit();">
                    <i class="si si-logout"></i>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </a>
                </li>
              </ul>
            </div>
            <!-- END Visible only in normal mode -->
          </div>
          <!-- END Side User -->

          <!-- Side Navigation -->
          <div class="content-side content-side-full">
            <ul class="nav-main" style="padding-bottom: 50px;">

                <li>
                    <a class="{{ request()->is('dashboard/info') ? ' active' : '' }}" href="{{route('info.index')}}">
                        <i class="si si-cup"></i><span class="sidebar-mini-hide">Information</span>
                    </a>
                </li>

                <li class="{{ request()->is('dashboard/slider*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Slider</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('dashboard/slider') ? ' active' : '' }}" href="{{route('slider.index')}}">All</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('dashboard/slider/create') ? ' active' : '' }}" href="{{route('slider.create')}}">Add Slider</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('dashboard/offer*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Offer</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('dashboard/offer') ? ' active' : '' }}" href="{{route('offer.index')}}">All</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('dashboard/offer/create') ? ' active' : '' }}" href="{{route('offer.create')}}">Add Item</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('dashboard/social*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Social</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('dashboard/social') ? ' active' : '' }}" href="{{route('social.index')}}">All</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('dashboard/social/create') ? ' active' : '' }}" href="{{route('social.create')}}">Add Item</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('dashboard/testimonial*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Testimonial</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('dashboard/testimonial') ? ' active' : '' }}" href="{{route('testimonial.index')}}">All</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('dashboard/testimonial/create') ? ' active' : '' }}" href="{{route('testimonial.create')}}">Add Item</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('dashboard/portfolio*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Portfolio</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('dashboard/portfolio') ? ' active' : '' }}" href="{{route('portfolio.index')}}">All</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('dashboard/portfolio/create') ? ' active' : '' }}" href="{{route('portfolio.create')}}">Add Item</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('dashboard/type*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Portfolio Types</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('dashboard/type') ? ' active' : '' }}" href="{{route('type.index')}}">All</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('dashboard/type/create') ? ' active' : '' }}" href="{{route('type.create')}}">Add Item</a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a class="{{ request()->is('dashboard/about') ? ' active' : '' }}" href="{{route('about.index')}}">
                        <i class="si si-cup"></i><span class="sidebar-mini-hide">About</span>
                    </a>
                </li>

                <li>
                    <a class="{{ request()->is('dashboard/contact') ? ' active' : '' }}" href="{{route('contact.index')}}">
                        <i class="si si-cup"></i><span class="sidebar-mini-hide">Contact</span>
                    </a>
                </li>

            </ul>
          </div>
          <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
      </div>
      <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-navicon"></i>
          </button>

        </div>
        <!-- END Left Section -->

      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header">
        <div class="content-header content-header-fullrow">
          <form action="/dashboard" method="POST">
            @csrf
            <div class="input-group">
              <div class="input-group-prepend">
                <!-- Close Search Section -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-times"></i>
                </button>
                <!-- END Close Search Section -->
              </div>
              <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
          <div class="content-header-item">
            <i class="fa fa-sun-o fa-spin text-white"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        <div class="content">
            @yield('content')
        </div>
    </main>
    <!-- END Main Container -->


  </div>
  <!-- END Page Container -->

  <!-- Codebase Core JS -->
  <script src="{{ asset('js/codebase.app.js') }}"></script>

  <!-- Laravel Scaffolding JS -->
  <!-- <script src="{{ asset('js/laravel.app.js') }}"></script> -->

  @yield('js_after')
</body>

</html>
