@extends('layouts_ecole.app')

@section('content')
<div class="container-fluid mt-4">
   <h1 class="mb-4 title_primaire_ecole">Collège</h1>
   <h3><a href="{{ route('site.college.profil') }}">Profils Enseignants Collège</a></h3>
   <div class="row">
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">Sixième</h2>
           <a href="{{ route('site.college.classe.sixieme')}}"><img src="{{ asset('images/cadrage5.jpg') }}" class="image-ecole"  alt=""></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">Cinqième</h2>
           <a href="{{ route('site.college.classe.cinqieme')}}"><img src="{{ asset('images/canape3.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">Quatrième</h2>
           <a href="{{ route('site.college.classe.quatrieme')}}"><img src="{{ asset('images/cuisson1.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">Troisième</h2>
           <a href="{{ route('site.college.classe.troisieme')}}"><img src="{{ asset('images/imagefinale.jpg') }}" alt="" class="image-ecole"></a>
       </div>
   </div>
</div>

@endsection