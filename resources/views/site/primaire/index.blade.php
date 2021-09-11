@extends('layouts_ecole.app')

@section('content')
<div class="container-fluid mt-4">
   <h1 class="mb-4 title_primaire_ecole">Ecole Primaire</h1>
   <h3><a href="{{ route('site.primaire.profil') }}">Profil Enseignant Primaire</a></h3>
   <div class="row">
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">CP</h2>
           <a href="{{ route('site.primaire.classe.cepe')}}"><img src="{{ asset('images/cadrage5.jpg') }}" class="image-ecole"  alt=""></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">CE1</h2>
           <a href="{{ route('site.primaire.classe.ceun')}}"><img src="{{ asset('images/canape3.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">CE2</h2>
           <a href="{{ route('site.primaire.classe.cedeux')}}"><img src="{{ asset('images/cuisson1.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">CM1</h2>
           <a href="{{ route('site.primaire.classe.cemun')}}"><img src="{{ asset('images/imagefinale.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
          <h2 class="title_second_ecole  mb-3">CM2</h2>
          <a href="{{ route('site.primaire.classe.cemdeux')}}"><img src="{{ asset('images/manioc.jpg') }}" alt="" class="image-ecole"></a>
       </div>
   </div>
</div>

@endsection