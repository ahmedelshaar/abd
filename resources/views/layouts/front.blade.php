<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$info->site_title}}</title>
    <meta name="description" content="{{$info->site_description}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
</head>

<body class="loading">
<div id="preloader">
    <div class="loader_line"></div>
</div>
<main>
<div data-scroll>
    <!--- Start Navbar -->
    <nav class="{{ request()->is('/') ? 'home ' : '' }} navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><img height="80" src="{{asset($info->site_logo)}}"></a>
            <button class="navbar-toggler" type="button">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('portfolios')}}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>

              </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="py-100">
        <div class="text-center">
            <img src="{{asset($info->site_logo)}}" class="mb-4" height="120px" data-aos="fade-up">
            <ul class="social-media" data-aos="fade-up">
                @foreach($socials as $social)
                <li>
                    <a href="{{$social->link}}" target="_blank">
                        <i class="{{$social->icon}}"></i>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </footer>
    <!-- End Footer -->
    </div>
    </main>
    <!-- js files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.0.8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('js/Scroll.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"></script>
    <script src="{{asset('js/animation.gsap.js')}}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('js')
</body>
</html>
