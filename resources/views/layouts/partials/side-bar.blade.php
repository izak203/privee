<div class="sidebar">
    
        <div class="sidebar-wrapper">
            <div class="logo">
            @if(Auth::user() && Auth::user()->subscribed('cashier'))   
                <a href="{{ route('site.profil.etudiant.index') }}" class="simple-text logo-normal">
                    Etudiant Dashboard
                </a>
                @endif
                @if(Auth::user()->experience && Auth::user()->role->name == 'teacher')  
                <a href="{{ route('site.profil.enseignant.index') }}" class="simple-text logo-normal">
                     Dashboard Professeur
                </a>
                @endif
            </div>
           
            <ul class="nav">
            @if(Auth::user() && Auth::user()->subscribed('cashier'))   
                <li class="active">
                    <a href="{{ route('site.profil.etudiant.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
            @endif
            @if(Auth::user()->experience && Auth::user()->role->name == 'teacher')    
                <li class="active">
                    <a href="{{ route('site.profil.enseignant.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
            @endif
                <li>
                    <a data-toggle="collapse" href="#quizCollapse" aria-expanded="false" aria-controls="quizCollapse">
                        <i class="fas fa-tasks"></i>
                        <p>All Quizzes</p>
                    </a>
                    <div class="list-group" id="quizCollapse">
                       @if(Auth::user()->maternel_id == 1 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.maternelle.quizpetitesectionquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 2 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.maternelle.quizmoyennesectionquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 3 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.maternelle.quizgrandesectionquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 4 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimairecpquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 5 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimaireceunquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 6 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimairecedeuxquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 7 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimairecemunquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 8 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.primaire.quizprimairecemdeuxquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 9 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.college.quizcollegesixiemequiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 10 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.college.quizcollegecinqiemequiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 11 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.college.quizcollegequatriemequiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 12 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.college.quizcollegetroisiemequiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 13 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.lycee.quizlyceesecondequiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 14 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.lycee.quizlyceepremierequiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 15 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.lycee.quizlyceeterminalequiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 16 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumerichtmlcssbootstrapquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 17 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericjavascriptquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 18 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericphpmysqlquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 19 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericpooquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        
                        @if(Auth::user()->maternel_id == 20 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericlaravelsymfonyquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif

                        @if(Auth::user()->maternel_id == 21 && Auth::user()->subscribed('cashier'))
                        <a href="{{ route('home.quiz.numeric.quiznumericwordpressdjoomlaquiz') }}" class="list-group-item list-group-item-action">
                        dashboard Quizzes
                        </a>
                        @endif
                       @if(Auth::user()  && Auth::user()->role->name == "teacher")
                        <a href="{{ route('quiz.index') }}" class="list-group-item list-group-item-action">
                           Dashboard quiz  
                        </a>
                      @endif
                    </div>
                </li>
               
            </ul>
            <ul class="nav">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                    >
                        <i class="fas fa-sign-out-alt"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
     
</div>