@extends('layouts_ecole.app')

@section('content')
<div class="container-fluid mt-4">
   <h1 class="mb-4 title_primaire_ecole">Ecole Maternelle</h1>
   <h3><a href="{{ route('site.maternelle.profil') }}">Profil Enseignant Maternelle</a></h3>
   <div class="row">
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">Petite Section</h2>
           <a href="{{ route('site.maternelle.classe.petitesection') }}"><img src="{{ asset('images/maternelle1.jpg') }}" class="image-ecole"  alt=""></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">Moyenne Section</h2>
           <a href="{{ route('site.maternelle.classe.moyennesection') }}"><img src="{{ asset('images/maternelle3.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">Grande Section</h2>
           <a href="{{ route('site.maternelle.classe.grandesection') }}"><img src="{{ asset('images/maternelle2.jpg') }}" alt="" class="image-ecole"></a>
       </div>
   </div>
</div>

@endsection