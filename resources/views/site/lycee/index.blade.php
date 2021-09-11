@extends('layouts_ecole.app')

@section('content')
<div class="container-fluid mt-4">
   <h1 class="mb-4 title_primaire_ecole">Lycée</h1>
   <h3><a href="{{ route('site.lycee.profil') }}">Profil Enseignant Lycee</a></h3>
   <div class="row">
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">Seconde</h2>
           <a href="{{ route('site.lycee.classe.seconde')}}"><img src="{{ asset('images/cadrage5.jpg') }}" class="image-ecole"  alt=""></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">Première</h2>
           <a href="{{ route('site.lycee.classe.premiere')}}"><img src="{{ asset('images/canape3.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">Terminale</h2>
           <a href="{{ route('site.lycee.classe.terminale')}}"><img src="{{ asset('images/cuisson1.jpg') }}" alt="" class="image-ecole"></a>
       </div>
   </div>
</div>

@endsection