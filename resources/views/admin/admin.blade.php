<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title') Dashboard | @if(Auth::user() && Auth::user()->subscribed('cashier')) Etudiant @endif  @if(Auth::user()->experience && Auth::user()->role->name == 'teacher') Teacher @endif @if(Auth::user() && Auth::user()->role->name == 'admin') Admin Panel @endif</title>
        <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    @yield('styles')
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
           @if(Auth::user() && Auth::user()->subscribed('cashier'))   
            <a class="navbar-brand" href="{{ route('site.profil.etudiant.index') }}">Dashboard Etudiant </a>
            @endif
            @if(Auth::user()->experience && Auth::user()->role->name == 'teacher')
            <a class="navbar-brand" href="{{ route('site.profil.enseignant.index') }}">Dashboard Enseignant </a>
            @endif
            @if(Auth::user() && Auth::user()->role->name == 'admin')
            <a class="navbar-brand" href="{{ route('admin.premiums.index') }}">Dashboard Admin Panel </a>
            @endif
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
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
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            @if(Auth::user() && Auth::user()->subscribed('cashier'))    
                            <a class="nav-link" href="{{ route('site.profil.etudiant.index') }} ">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard Etudiant
                            </a>
                            @endif
                            @if(Auth::user()->experience && Auth::user()->role->name == 'teacher') 
                            <a class="nav-link" href="{{ route('site.profil.enseignant.index') }} ">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard Professeur 
                            </a>
                           @endif
                           @if(Auth::user() && Auth::user()->role->name == 'admin') 
                            <a class="nav-link" href="{{ route('admin.premiums.index') }} ">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard Admin 
                            </a>
                           @endif
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            @if(Auth::user() && Auth::user()->subscribed('cashier'))  
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                           
                               <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Espace Etudiant
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            @endif
                            @if(Auth::user()->experience && Auth::user()->role->name == 'teacher') 
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                           
                               <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Espace Professeur
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            @endif
                            @if(Auth::user() && Auth::user()->role->name == 'admin') 
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                           
                               <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Espace admin
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            @endif
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                
                            <nav class="sb-sidenav-menu-nested nav">
                            @if(Auth::user() && Auth::user()->subscribed('cashier'))    
                        <a href="{{ route('site.profil.etudiant.index') }}" class="nav-link">
                            Espace Etudiant
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 1 && Auth::user()->category_id == 1 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematernelun') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 2 && Auth::user()->category_id == 1 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematerneldeux') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 3 && Auth::user()->category_id == 1 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematerneltrois') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 4 && Auth::user()->category_id == 2 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecp') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 5 && Auth::user()->category_id == 2 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimaireceun') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 6 && Auth::user()->category_id == 2 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecedeux') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 7 && Auth::user()->category_id == 2 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecemun') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 8 && Auth::user()->category_id == 2 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecemdeux') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 9 && Auth::user()->category_id == 3 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegesixieme') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 10 && Auth::user()->category_id == 3 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegecinqieme') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 11 && Auth::user()->category_id == 3 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegequatrieme') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 12 && Auth::user()->category_id == 3 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegetroisieme') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 13 && Auth::user()->category_id == 4 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceeseconde') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 14 && Auth::user()->category_id == 4 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceepremiere') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 15 && Auth::user()->category_id == 4 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceeterminale') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 16 && Auth::user()->category_id == 5 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquehtmlcssbootstrap') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 17 && Auth::user()->category_id == 5 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquejavascript') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 18 && Auth::user()->category_id == 5 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquephpmysql') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 19 && Auth::user()->category_id == 5 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquepoo') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 20 && Auth::user()->category_id == 5 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquelaravelsymfony') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 21 && Auth::user()->category_id == 5 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquewordpressdjoomla') }}" class="nav-link">
                            AJOUTER NOTES USER
                        </a>
                        @endif
                        @if(Auth::user() && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('site.profil.etudiant.bulletinelevenotedevoir') }}" class="nav-link">
                           NOTES DEVOIR USER
                        </a>
                        <a href="{{ route('site.profil.etudiant.bulletinelevenoteexercice') }}" class="nav-link">
                           NOTES EXERCICE USER
                        </a>
                        @endif
                        @if(Auth::user()->valider_bulletin == 1 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('site.profil.etudiant.bulletinelevepremiertrimestre') }}" class="nav-link">
                           BULLETIN PREMIER TRIMESTRE
                        </a>
                        @endif
                        @if(Auth::user()->valider_bulletin == 2 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('site.profil.etudiant.bulletinelevedeuxiemetrimestre') }}" class="nav-link">
                           BULLETIN DEUXIEME TRIMESTRE
                        </a>
                        @endif
                        @if(Auth::user()->valider_bulletin == 3 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('site.profil.etudiant.bulletinelevetroisiemetrimestre') }}" class="nav-link">
                           BULLETIN TROISIEME TRIMESTRE 
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 15 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('site.lycee.classe.terminalequiz') }}" class="nav-link">
                           Obtenir les quiz
                        </a>
                        @endif
                        @if(Auth::user()->maternel_id == 15 && Auth::user()->matiere_id == 1 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('site.profil.enseignant.quizresultstudent') }}" class="nav-link">
                           Obtenir les quiz d'un teacher 
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 1 && Auth::user()->role->name == "teacher")
                        <a href="{{ route('quiz.index') }}" class="nav-link">
                           Dashboard quiz  
                        </a>
                        @endif
                        
                        @if(Auth::user()->maternel_id == 1 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.maternelle.quizpetitesectionquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 2 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.maternelle.quizmoyennesectionquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 3 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.maternelle.quizgrandesectionquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 4 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimairecpquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 5 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimaireceunquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 6 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimairecedeuxquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 7 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimairecemunquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 8 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimairecemdeuxquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 9 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.college.quizcollegesixiemequiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 10 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.college.quizcollegecinqiemequiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 11 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.college.quizcollegequatriemequiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 12 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.college.quizcollegetroisiemequiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 13 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.lycee.quizlyceesecondequiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 14 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.lycee.quizlyceepremierequiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 15 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.lycee.quizlyceeterminalequiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 16 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumerichtmlcssbootstrapquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 17 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericjavascriptquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 18 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericphpmysqlquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 19 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericpooquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        
                        @if(Auth::user()->maternel_id == 20 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericlaravelsymfonyquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 21 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericwordpressdjoomlaquiz') }}" class="nav-link">
                        dashboard Quizzes
                        </a>
                        @endif
                        
                        @if(Auth::user() && Auth::user()->role->name == "admin")
                            <a href="{{ route('admin.premiums.index') }}" class="nav-link">
                                <P>Valider les profs</P>
                            </a>
                
                            <a href="{{ route('admin.premium.index') }}" class="nav-link">
                                Valider les cours des professeurs
                            </a>
                            <a href="{{ route('admin.users.etudiant.index') }}" class="nav-link">
                            Profil étudiant 
                            </a>
                            <a href="{{ route('admin.users.enseignant.enseignant') }}" class="nav-link">
                            Profil enseignant 
                            </a>
                            <a href="{{ route('admin.payment.index') }}" class="nav-link">
                            Payments users
                            </a>
                        @endif
                         </nav>
                            </div>
                            <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>-->
                            <!--<div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>-->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                   <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                    </div>
                   
                    <div class="container-fluid">
                    @yield('content')
                    </div>
                    
                   
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('backend/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/assets/demo/datatables-demo.js') }}"></script>
        @yield('js')
    </body>
</html>



