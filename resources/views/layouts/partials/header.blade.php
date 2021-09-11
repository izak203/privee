<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand font-italic font-weight-bold" href="">
                SeersolQuiz
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
           <div class="collapse navbar-collapse" id="navigation">
                 <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.profil.etudiant.create') }}">{{ __('Profil Etudiant') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.profil.enseignant.create') }}">Teacher</a>
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
</nav>


<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar -->
