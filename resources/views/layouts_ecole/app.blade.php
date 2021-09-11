<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/main.css') }}" rel="stylesheet">
   
    @yield('style')
    
</head>



<body style="background-color:#fffef7e8;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm" style="height:80px;background-color:rgb(4, 100, 155; color:#fff;">
            <div class="container-fluid">
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>--> 
                <a class="navbar-brand" href="{{ url('/') }}">
                     <img src="{{ asset('images/manioc.jpg') }}" style="border-radius:50%;" alt="habitacle" width="65" height="65">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                   <!-- <ul class="navbar-nav ml-auto">-->
                        <!-- Authentication Links -->
                        
                        <!--@guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('site.profil.enseignant.create') }}">Profil Enseignant</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->image)
                                        <img src="/image/users/{{ Auth::user()->image }}" style="border-radius:50%;position:absolute;top:0px;left:10px;" alt="" width="130" height="100"><br><br><br><br>
                                        @else
                                    <img src="/images/users/default.png" alt="" style="border-radius:50%;" width="130" height="100" />
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if(auth::user()->experience)
                                    <a class="dropdown-item" href="{{ route('site.profil.enseignant.index') }}">Profil Enseignant</a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('site.profil.etudiant.index') }}">Profil etudiant</a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>--> 

                    <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('site.contacts.create') }}">{{ __('Contact') }}</a>
                            </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('site.profil.etudiant.create') }}">{{ __('Profil Etudiant') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('site.profil.enseignant.create') }}">{{ __('Profil Teacher') }}</a>
                            </li>
                            @else
                            @if(Auth::user() && Auth::user()->role->name == 'admin')
                            <li class="nav-item">
                                <a  class="nav-link" href="{{ route('admin.premiums.index') }}">Profil Admin</a>
                            </li>
                             @endif
                                <li class="nav-item dropdown">
                                    
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->image)
                                            <img src="/image/users/{{ Auth::user()->image }}" style="border-radius:50%;position:absolute;top:0px;left:10px;" alt="" width="130" height="100"><br><br><br><br>
                                            @else
                                        <img src="/images/users/default.png" alt="" style="border-radius:50%;" width="130" height="100" />
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        @if(Auth::user()->experience && Auth::user()->role->name == 'teacher')
                                        <a class="dropdown-item" href="{{ route('site.profil.enseignant.index') }}">Profil Enseignant</a>
                                        @endif
                                        @if(Auth::user() && Auth::user()->subscribed('cashier'))
                                        <a class="dropdown-item" href="{{ route('site.profil.etudiant.index') }}">Profil etudiant</a>
                                        @endif
                                        @if(Auth::user() && Auth::user()->role->name == 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.premiums.index') }}">Profil Admin</a>
                                        @endif
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                   </div>
                </div>
            </div>
        </nav>
  
        
        <div class="container-fluid mt-4">
        
         <!-- <img src="{{ asset('images/maternelle1.jpg') }}" alt="" width="100%" height="400">-->
        </div>
       
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    @yield('js')
</body>
</html>
