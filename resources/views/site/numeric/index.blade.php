@extends('layouts_ecole.app')

@section('content')
<div class="container-fluid mt-4">
   <h1 class="mb-4 title_primaire_ecole">Module numéric</h1>
   <h3><a href="{{ route('site.numeric.profil') }}">Profil Enseignant Module Numéric</a></h3>
   <div class="row">
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">PHP MYSQL</h2>
           <a href="{{ route('site.numeric.classe.phpmysql')}}"><img src="{{ asset('images/cadrage5.jpg') }}" class="image-ecole"  alt=""></a>
       </div>
       <div class="col-4">
          <h2 class="title_second_ecole  mb-3">POO</h2>
          <a href="{{ route('site.numeric.classe.poo') }}"><img src="{{ asset('images/manioc.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">JAVASCRYPT</h2>
           <a href="{{ route('site.numeric.classe.javascript') }}"><img src="{{ asset('images/canape3.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">CSS3 HTML5 BOOTSTRAP</h2>
           <a href="{{ route('site.numeric.classe.htmlcssbootstrap') }}"><img src="{{ asset('images/cuisson1.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">FRAMEWORK LARAVEL SYMFONY</h2>
           <a href="{{ route('site.numeric.classe.laravelsymfony') }}"><img src="{{ asset('images/imagefinale.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
          <h2 class="title_second_ecole  mb-3">CMS WORDPRESS ET DJOOMLA</h2>
          <a href="{{ route('site.numeric.classe.wordpressdjoomla') }}"><img src="{{ asset('images/manioc.jpg') }}" alt="" class="image-ecole"></a>
       </div>
   </div>
</div>
@endsection