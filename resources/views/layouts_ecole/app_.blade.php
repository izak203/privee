<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script data-ad-client="ca-pub-6703439729369306" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<!--<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113227726-1');
</script> -->
    
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/voiture1.jpg') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  
    <!-- Scripts -->
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  
    <!-- Styles -->
    <link href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- debut rateable -->
</head>
<body style="background-color:rgb(4, 158, 182);">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel" style="background-color: rgb(177, 117, 5);">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                     <img src="{{ asset('images/habitacle.jpg') }}" style="border-radius:50%;" alt="habitacle" width="65" height="65">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         CATEGORIES ANNONCES
                        </a>
                       
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ANNONCES PAR PAYS
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="">ANNONCES PAR PAYS</a>
                            </div>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link disparue" href="">VIDEO FORMATION <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link disparue" href="">CONTACT <span class="sr-only">(current)</span></a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                           <li class="nav-item" style="display:inline-block; background-color:red;">
                                <a href="" class="nav-link">PUBLIER UNE ANNONCE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disparue" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="{{ route('site.subscribes.subscribe') }}">COMPTEPRO</a>
                            </li>
                            @if (Route::has('site.utilisateurs.signup'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('site.utilisateurs.signup') }}">{{ __('COMPTEPERSO') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="postion:relative;padding-left:50px;">
                                   {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   @if(Auth::user()->image)
                                    <img src="/image/users/{{ Auth::user()->image }}" style="border-radius:50%;position:absolute;top:0px;left:10px;" alt="" width="130" height="100"><br><br><br><br>
                                    @else
                                  <img src="/image/users/default.png" alt="" style="border-radius:50%;" width="130" height="100" />
                                  @endif
                                    <a class="dropdown-item" href="">Comptes</a>
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
                       
                    </ul>
                </div>
            
             </nav>
             
            <div class="mt-4">
                @yield('content')
           </div>

           
</div>   
      <!-- Footer -->

<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
    @yield('js') 
  </body>
</html>
