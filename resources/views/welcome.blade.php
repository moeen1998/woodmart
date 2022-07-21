<!DOCTYPE html>
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
    <body class="antialiased">
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
                                    <button class="dropdown-toggle p-0" type="button" id="languages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px">
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
                            <li style="margin-right: 10px"><a href="https://weareindigo.io/" class="text-light"><i class="fa-brands fa-pinterest-square"></i></a></li>
                            <li ><i class="fa-regular fa-envelope"></i> Newsletters</li>
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
                            <li class="nav-item nav-link"><a href="/wish" class="text-muted"> <i class="fa-regular fa-heart"></i></a></li>
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
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
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
            <!-- document.getElementsByClassName('colors')[0].childNodes-->
            <div class="main mt-1" style="background-color: rgba(0, 0, 0, 0.1)">
                <div class="container-fulwid">
                    <div class="row">
                        <div class="col">
                            <div class="slider" >
                                <div id="firstslider" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" style="height: 600px">
                                        <div class="carousel-item active">
                                            <div class="mx-auto position-relative" style="width: 80%;text-align: right; background-color: #f8f8f8">
                                                <img src="/imgs/slider/chaire-blue.jpg" alt="chaire">
                                                <div style="position:absolute; top: 200px; left:120px; text-align: left; width: 300px">
                                                    <h2>eames-side chair.</h2>
                                                    <p class="colors mt-2" style="font-size: 25px">colors: 
                                                        <span data-color="blue" style="background-color: #8ab1ae"></span> 
                                                        <span data-color="red" style="background-color: #e63e3b"></span>
                                                        <span data-color="yellow" style="background-color: #ec8a1f"></span>
                                                    </p>
                                                    <p>
                                                        Semper vulputate aliquam curae condimentum quisque gravida fusce convallis arcu cum at.
                                                    </p>
                                                    <h2> only 99.00$</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="mx-auto position-relative" style="width: 80%;text-align: right; background-color: #f8f8f8">
                                                <img src="/imgs/slider/chaire-red.jpg" alt="chaire">
                                                <div style="position:absolute; top: 200px; left:120px;text-align: left; width: 300px">
                                                    <h2>eames-side chair.</h2>
                                                    <p class="colors mt-2" style="font-size: 25px">colors: 
                                                        <span data-color="blue" style="background-color: #8ab1ae"></span> 
                                                        <span data-color="red" style="background-color: #e63e3b"></span>
                                                        <span data-color="yellow" style="background-color: #ec8a1f"></span>
                                                    </p>
                                                    <p>
                                                        Semper vulputate aliquam curae condimentum quisque gravida fusce convallis arcu cum at.
                                                    </p>
                                                    <h2> only 99.00$</h2>
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class="carousel-item">
                                            <div class="mx-auto position-relative" style="width: 80%;text-align: right; background-color: #f8f8f8">
                                                <img src="/imgs/slider/chaire-yellow.jpg" alt="chaire">
                                                <div style="position:absolute; top: 200px; left:120px;text-align: left; width: 300px">
                                                    <h2>eames-side chair.</h2>
                                                    <p class="colors mt-2" style="font-size: 25px">colors: 
                                                        <span data-color="blue" style="background-color: #8ab1ae"></span> 
                                                        <span data-color="red" style="background-color: #e63e3b"></span>
                                                        <span data-color="yellow" style="background-color: #ec8a1f"></span>
                                                    </p>
                                                    <p>
                                                        Semper vulputate aliquam curae condimentum quisque gravida fusce convallis arcu cum at.
                                                    </p>
                                                    <h2> only 99.00$</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#firstslider" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#firstslider" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="text-center" style="padding: 130px 0px">
                WOODMART COLLECTIONS 
                <h2 class="p-2">FEATURED CATEGORIES</h2>
                Wood Mart is a powerful eCommerce theme for WordPress.
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-end" style="height: 525px; background-image: url('/imgs/sections/chair.jpg');background-position: center;background-size: cover">
                            <h2><a href="http://127.0.0.1:8000/product-of-category-num-/1" class="text-muted text-decoration-none">furniture</a></h2>
                        </div>
                    </div>
    
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col">
                                <div>
                                    <div class="d-flex align-items-end" style=" height: 250px; background-image: url('/imgs/sections/clock.jpg');background-position: center;padding: 5px;margin: 0px 25px 25px 25px;background-size: cover">
                                        <h2><a href="http://127.0.0.1:8000/product-of-category-num-/2" class="text-muted text-decoration-none">clocks</a></h2>
                                    </div>
                                    <div class="d-flex align-items-end" style=" height: 250px; background-image: url('imgs/sections/light.jpg');background-position: center;padding: 5px;margin: 0px 25px 25px 25px;background-size: cover">
                                        <h2><a href="http://127.0.0.1:8000/product-of-category-num-/4" class="text-muted text-decoration-none">lighting</a></h2>
                                    </div>                
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <div class="d-flex align-items-end" style=" height: 250px; background-image: url('/imgs/sections/accessories.jpg');background-position: center;padding: 5px;margin: 0px 25px 25px 25px;background-size: cover">
                                        <h2><a href="http://127.0.0.1:8000/product-of-category-num-/3" class="text-muted text-decoration-none">accessories</a></h2>
                                    </div>
                                    <div class="d-flex align-items-end" style=" height: 250px; background-image: url('/imgs/sections/toy.jpg');background-position: center;padding: 5px;margin: 0px 25px 25px 25px;background-size: cover">
                                        <h2><a href="http://127.0.0.1:8000/product-of-category-num-/5" class="text-muted text-decoration-none">toys</a></h2>
                                    </div>                
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
    
                <section id="portfolio" class="portfolio section-bg">
                    <div class="container">
                      <div class="section-title text-center"  style="padding: 130px 0px">
                        WOODEN ACCESSORIES
                        <h2>FEATURED PRODUCTS</h2>
                        Visit our shop to see amazing creations from our designers.
                      </div>
                      <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                          <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($data['categories'] as $category)
                                <li data-filter=".filter-{{$category->name}}">{{ $category->name }}</li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                      <div class="row portfolio-container">
                        @foreach ($data['categories'] as $category)
                            @foreach ($category->producs as $product)
                                <div class="col-lg-4 col-md-6 portfolio-item filter-{{$category->name}}">
                                    <div class="portfolio-wrap">

                                        <img src="/imgs/shuffle/slidernew/{{ $product->imgs[0]->img }}" style="width: 70%;height: 70%" class="img-fluid" alt="">
                                        <div class="portfolio-info" style="margin-top: -10%">
                                            <h4>{{ $product->name }}</h4>
                                            <p class="py-4">{{ $product->description }}</p>
                                            <a class="text-light m-2 h2" href="{{ route('add.to.cart', $product->id) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Add to cart"><i class="fa-solid fa-plus"></i></a>
                                            <a class="text-light m-2 h2" href="{{ route('add.to.wish', $product->id) }}" title="Add to wish"><i class="fa-regular fa-heart"></i></a>
                                            <a class="text-light m-2 h2" href="{{ route('product.details', $product->id) }}" title="More Details"><i class="fa-solid fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach 
                        @endforeach
                        </div>
                    </div>
                  </section>
            </div>
    
            <div class="greenslider d-none d-md-block">
                <div class="overlay">
                    <div class="container-fulwid">
                        <div class="row">
                            <div class="col">
    
                                <div id="secondslider" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                      <li style="cursor: pointer; width: 10px;height: 10px; border-radius: 50%" data-target="#secondslider" data-slide-to="0" class="active"></li>
                                      <li style="cursor: pointer; width: 10px;height: 10px; border-radius: 50%" data-target="#secondslider" data-slide-to="1"></li>
                                      <li style="cursor: pointer; width: 10px;height: 10px; border-radius: 50%" data-target="#secondslider" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" style="padding: 0px 60px">
                                      <div class="carousel-item active secondslider">                                        
                                        <img src="/imgs/slider/secondsliderchair.png" alt="First slide">
                                        <div class="data">
                                            <p> PRODUCT LANDING PAGE </p>
                                            <h2> Vitra Chair - Classic Design. </h2>
                                            <div class="spans">
                                                <span>DESIGNER:<br/>Charles, Ray Eames</span>
                                                <span>MATERIALS:<br/>Wood, Leather, Metal</span>
                                                <span>CLIENT:<br/>Woodmart, Basel</span>
                                            </div>
                                            <h3>$1999.00</h3>
                                            <button type="button" class="btn btn-outline-success">Add To Cart</button>
                                        </div>
                                      </div>
                                      <div class="carousel-item secondslider">
                                        <img src="/imgs/slider/secondsliderlap.png" alt="First slide">
                                        <div class="data">
                                            <p> PRODUCT LANDING PAGE </p>
                                            <h2> Vitra Chair - Classic Design. </h2>
                                            <div class="spans">
                                                <span>DESIGNER:<br/>Charles, Ray Eames</span>
                                                <span>MATERIALS:<br/>Wood, Leather, Metal</span>
                                                <span>CLIENT:<br/>Woodmart, Basel</span>
                                            </div>
                                            <h3>$1999.00</h3>
                                            <button type="button" class="btn btn-outline-success">Add To Cart</button>
                                        </div>
                                      </div>
                                      <div class="carousel-item secondslider">
                                        <img src="/imgs/slider/secondslider.png" alt="First slide">
                                        <div class="data">
                                            <p> PRODUCT LANDING PAGE </p>
                                            <h2> Vitra Chair - Classic Design. </h2>
                                            <div class="spans">
                                                <span>DESIGNER:<br/>Charles, Ray Eames</span>
                                                <span>MATERIALS:<br/>Wood, Leather, Metal</span>
                                                <span>CLIENT:<br/>Woodmart, Basel</span>
                                            </div>
                                            <h3>$1999.00</h3>
                                            <button type="button" class="btn btn-outline-success">Add To Cart</button>
                                        </div>
                                      </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#secondslider" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#secondslider" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
    
            <div class="clearfix"></div>
    
            <div class="container-fulwid">
                <div class="row">
                    <div class="col chairebackground">
                        <div class="px-4 text-muted">
                            <p class="mt-5"> ALL-IN-ONE ECOMMERCE SOLUTION  </p>
                            <h2> WoodMart - WooCommerce Theme </h2>
                            <p class="w-50"> Wood Mart WooCommerce theme for WordPress is the only thing you need to create your perfect online store. Use it for any kind of website: business, corporate, retail, multivendors. </p>
                            <button type="button" class="btn btn-outline-success">Add To Cart</button>
                            <button type="button" class="btn btn-outline-success">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="container-fulwid mt-3">
                <div class="row">
                    <div class="col tablesection">
                        <div class="px-4 text-muted text-center">
                            <h2 class="mt-5"> <b>JOIN OUR NEWSLETTER NOW </b> </h2>
                            
                            <div class="input-group mb-3 d-block py-3">
                                <input type="text" class="form-control d-inline mr-2" placeholder="Your email address
                                " aria-label="Recipient's username" aria-describedby="basic-addon2" style="width: 400px">
                                <button type="button" class="btn btn-success px-4" style="background-color: #84b736">SIGN UP</button>
                            </div>
                            <p> Will be used in accordance with our <b>Privacy Policy</b> </p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="text-center" style="padding: 130px 0px 100px 0px">
                FURNITURE GUIDES
                <h2 class="p-2"> <b> OUR LATEST NEWS </b></h2>
                Latest trends and inspiration in interior design.
            </div>
    
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
                    <div class="col">
                    <div class="card h-100">
                        <img src="/imgs/card/card1.jpg" class="card-img-top" alt="Skyscrapers"/>
                        <div class="card-body">
                        <h5 class="card-title mt-3"><b>Seating collection inspiration </b></h5>
                        <p class="card-text p-4">
                             <br/>
                            Ac haca ullamcorper donec ante habitasse donec imperdiet eturpis varius per a augue magna hac. Nec
                            hac et vestibulum duis a tincidunt per a...
                            
                        </p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted"><a class="textlink" href="#"> <b> CONTINUE READING </b> </a></small>
                        </div>
                    </div>
                    </div>
                    <div class="col">
                    <div class="card h-100">
                        <img src="/imgs/card/card2.jpg" class="card-img-top" alt="Los Angeles Skyscrapers"/>
                        <div class="card-body">
                            <h5 class="card-title mt-3"><b>Seating collection inspiration </b></h5>
                            <p class="card-text p-4">
                                 <br/>
                                Ac haca ullamcorper donec ante habitasse donec imperdiet eturpis varius per a augue magna hac. Nec
                                hac et vestibulum duis a tincidunt per a...
                                
                            </p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted"><a class="textlink" href="#"> <b> CONTINUE READING </b> </a></small>
                            </div>
                    </div>
                    </div>
                    {{-- https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp --}}
                    <div class="col">
                    <div class="card h-100">
                        <img src="/imgs/card/card3.jpg" class="card-img-top" alt="Palm Springs Road"/>
                        <div class="card-body">
                            <h5 class="card-title mt-3"><b>Seating collection inspiration </b></h5>
                            <p class="card-text p-4">
                                 <br/>
                                Ac haca ullamcorper donec ante habitasse donec imperdiet eturpis varius per a augue magna hac. Nec
                                hac et vestibulum duis a tincidunt per a...
                                
                            </p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted"><a class="textlink" href="#"> <b> CONTINUE READING </b> </a></small>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
    
            <div class="brands text-center">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-md-4 col-lg-2 col-sm-12 p-3 my-5"> <img style="width: 80%;height: 80%" src="/imgs/sections/brand1.png" alt="brand"> </div>
                        <div class="col-md-4 col-lg-2 col-sm-12 p-3 my-5"> <img style="width: 80%;height: 80%" src="/imgs/sections/brand2.png" alt="brand"> </div>
                        <div class="col-md-4 col-lg-2 col-sm-12 p-3 my-5"> <img style="width: 80%;height: 80%" src="/imgs/sections/brand3.png" alt="brand"> </div>
                        <div class="col-md-4 col-lg-2 col-sm-12 p-3 my-5"> <img style="width: 80%;height: 80%" src="/imgs/sections/brand4.png" alt="brand"> </div>
                        <div class="col-md-4 col-lg-2 col-sm-12 p-3 my-5"> <img style="width: 80%;height: 80%" src="/imgs/sections/brand5.png" alt="brand"> </div>
                        <div class="col-md-4 col-lg-2 col-sm-12 p-3 my-5"> <img style="width: 80%;height: 80%" src="/imgs/sections/brand6.png" alt="brand"> </div>
                    </div>
                </div>
            </div>
    
            <div class="websites text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <p> PREBUILT LAYOUTS  </p>
                            <h3 class="my-4"> <b> WOODMART DEMOS </b> </h3>
                            <p> High-quality demos and layouts. </p>
                            <a href="#" class="green"> <b> VIEW ALL </b></a>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            
                            <div class="row">
                                <div class="col"><img style="width: 100%;height: 100%" src="/imgs/sections/website1.jpg" alt=""></div>
                                <div class="col"><img style="width: 100%;height: 100%" src="/imgs/sections/website2.jpg" alt=""></div>
                                <div class="col"><img style="width: 100%;height: 100%" src="/imgs/sections/website3.jpg" alt=""></div>
                                <div class="col"><img style="width: 100%;height: 100%" src="/imgs/sections/website4.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
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
                                    <img src="imgs/sections/footer1.jpg" alt="footerimg">
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

        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/myjs.js') }}"></script>
    </body>
</html>
