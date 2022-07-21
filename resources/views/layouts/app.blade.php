<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/js/app.js'])
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
    <div id="app" class="text-muted" style="overflow: hidden">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #84b736">
            <div class="container text-nowrap">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav1" aria-controls="nav1" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav1">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto text-light text">
                        <li>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="languages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px">
                                English
                                </button>
                                <div class="dropdown-menu" aria-labelledby="languages">
                                <a class="dropdown-item" href="#">Spanish</a>
                                <a class="dropdown-item" href="#">Mandarin Chinese</a>
                                <a class="dropdown-item" href="#">Hindi</a>
                                </div>
                            </div>
                        </li>
                        <li>

                            <div class="dropdown">
                                <button class="dropdown-toggle p-0" type="button" id="country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Countery
                                </button>
                                <div class="dropdown-menu" aria-labelledby="country">
                                    <a class="dropdown-item" href="#">Afghanistan</a>
                                    <a class="dropdown-item" href="#">Albania</a>
                                    <a class="dropdown-item" href="#">Algeria</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            FREE SHIPPING FOR ALL ORDERS OF $150
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto text-light icons">
                        <li><a href="https://es-la.facebook.com/weareindigo.io/" class="text-light"> <i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="https://weareindigo.io/" class="text-light"> <i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="https://weareindigo.io/" class="text-light"><i class="fa-solid fa-envelope"></i></a></li>
                        <li><a href="https://www.instagram.com/weareindigo.io/?utm_medium=copy_link" class="text-light"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="https://weareindigo.io/" class="text-light"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="https://weareindigo.io/" class="text-light"><i class="fa-brands fa-pinterest-square"></i></a></li>
                        <li><i class="fa-regular fa-envelope"></i> Newsletters</li>
                        <li><a href="https://weareindigo.io/contact-us/" class="text-light text-decoration-none">contact us</a></li>
                        <li>faqs</li>
                    </ul>
                </div>
            </div>
        </nav>


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('imgs/logo.svg') }}" alt="woodmart" width="200px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav2" aria-controls="nav2" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav2">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li>
                            <div class="input-group" >
                                <input type="search" class="form-control" placeholder="Search here" style="width: 200px; margin-left: 50px"/>
                                <select id="category" class="form-select" aria-label="Default select example">
                                    <option selected disabled>categories</option>
                                    <option value="{{ url('/')  }}"> all </option>
                                    @foreach ($data['categories'] as $category)
                                        <option value="{{ route('category.products', $category->id) }}"> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            <li class="nav-item" style="padding: 8px 0px">
                                /
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item nav-link"><a href="/wish" class="text-muted"> <i class="fa-regular fa-heart"></i> </a></li>
                        <li class="nav-item nav-link"><i class="fa-solid fa-shuffle"></i></li>
                        <li class="nav-item nav-link"><a href="/cart" class="text-muted"><i class="fa-solid fa-briefcase"></i></a> {{ $data['total'] ?? " 00.00"  }} $</li>
                    </ul>
                </div>
            </div>
        </nav>


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="navbar-brand " style="width: 25%;min-width: 250px; background-color: #84b736;">
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" id="languages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i> browse broducts
                        </button>
                        <div class="dropdown-menu" aria-labelledby="languages" style="width: 100%">
                            <a class="dropdown-item" href="{{ url('/') }}" style="border-bottom: 1px solid #ccc"> all </a>
                            @foreach ($data['categories'] as $category)
                                <a class="dropdown-item" href="{{ route('category.products', $category->id) }}" style="border-bottom: 1px solid #ccc"> {{ $category->name }} </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav3" aria-controls="nav3" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav3" style="width: 70%; border-top: 1px solid #ccc">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto" >
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Elements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Buy</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">special offer</a>
                        </li>
                        <li class="nav-item" style="padding: 8px 0px">
                            |
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">purchase theme</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-2">
            @yield('content')
        </main>



        <div class="about my-5 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <img src="/imgs/logo.svg" alt="logo" style="margin: 0px 0px 40px 0px; opacity: .7; width:100%">
                        <p>
                            Condimentum adipiscing vel neque dis nam parturient orci at scelerisque neque dis nam parturient
                        </p>
                        <p><i class="fa-solid fa-location-arrow"></i> 1451 Wall Street, UK, London</p>
                        <p><i class="fa-solid fa-mobile-screen"></i> Phone: (064) 332-1233</p>
                        <p><i class="fa-regular fa-envelope"></i> Fax: (099) 453-1357</p>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <h2 class="mb-5"><b> Recent posts </b></h2>
                        <div class="item overflow-hidden my-3">
                            <div class="float-left">
                                <img src="/imgs/sections/footer1.jpg" alt="footerimg">
                            </div>   
                            <div class="float-right" style="width: 64%">
                                <h5> A companion for extra sleeping </h5>
                                <p> July 23, 2016 1 Comment </p>
                            </div>
                        </div>
                        <hr/>
                        <div class="item overflow-hidden my-4">
                            <div class="float-left" >
                                <img src="/imgs/sections/footer2.jpg" alt="footerimg">
                            </div>   
                            <div class="float-right" style="width: 64%">
                                <h5 class="mt-0"> Outdoor seating collection inspiration  </h5>
                                <p> July 23, 2016 1 Comment </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <h3 class="mb-5"><b> OUR STORES </b></h3>
                        <ul>
                            <li> New York </li>
                            <li> London SF </li>
                            <li> Cockfosters BP </li>
                            <li> Los Angeles </li>
                            <li> Chicago </li>
                            <li> Las Vegas </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <h3 class="mb-5"><b> USEFUL LINKS </b></h3>
                        <ul>
                            <li> Privacy Policy </li>
                            <li> Returns </li>
                            <li> Terms & Conditions </li>
                            <li> Contact Us </li>
                            <li> Latest News </li>
                            <li> Our Sitemap </li>    
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <h3 class="mb-5"><b> FOOTER MENU </b></h3>
                        <ul>
                            <li> Instagram profile </li>
                            <li> New Collection </li>
                            <li> Woman Dress </li>
                            <li> Contact Us </li>
                            <li> Latest News </li>
                            <li> Purchase Theme </li>   
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p><small> <b>WOODMART</b> &copy; 2022 CREATED BY <b><span style="color: red"> X</span>TEMOS STUDIO</b>. PREMIUM E-COMMERCE SOLUTIONS. </small></p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <img src="/imgs/sections/payments.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/myjs.js') }}"></script>

</body>
</html>
