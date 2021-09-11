@extends('layouts_ecole.app')

@section('content')
<div class="container-fluid">

   @if(Auth::user() and Auth::user()->subscribed('cashier'))
   <h1 class="mb-4 title_primaire_ecole">Ecole privée numéric</h1>           
   <div class="row">
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">Ecole Maternelle</h2>
           <a href="{{ route('site.maternelle.index')}}"><img src="{{ asset('images/maternelle1.jpg') }}" class="image-ecole"  alt=""></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole mb-3">Ecole Primaire</h2>
           <a href="{{ route('site.primaire.index') }}"><img src="{{ asset('images/maternelle2.jpg') }}" alt="" class="image-ecole"></a>
       </div>
       <div class="col-4">
           <h2 class="title_second_ecole  mb-3">Ecole Collège</h2>
           <a href="{{ route('site.college.index') }}"><img src="{{ asset('images/maternelle3.jpg') }}" alt="" class="image-ecole"></a>
       </div>
   </div>
   <div class="row">
        <div class="col-4 mt-4">
                <h2 class="title_second_ecole mb-3">Ecole Lycée</h2>
                <a href="{{ route('site.lycee.index') }}"><img src="{{ asset('images/lycee.jpg') }}" alt="" class="image-ecole"></a>
            </div>
        <div class="col-4 mt-4">
                <h2 class="title_second_ecole  mb-3">Modules numérics <a href="{{ route('site.numeric.index') }}">choisir votre pacours</a></h2>
                <a href="{{ route('site.numeric.index') }}"><img src="{{ asset('images/numeric.jpg') }}" alt="" class="image-ecole"></a>
        </div>
</div>
   @else
<div class="row">
   <div class="col-6">
      <h2 class="title_second_ecole mb-3">Cursus scolaire complet du CP au terminale <a href="{{ route('login')}}" class="btn btn-primary">S'inscrire maintenant</a> </h2>
      <a href="{{ route('login')}}"><img src="{{ asset('images/maternelle1.jpg') }}" class="image-ecole"  alt=""></a>
    </div>
    <div class="col-6">
        <h2 class="title_second_ecole mb-3">Modules numérics <a href="{{ route('login') }}">choisir votre pacours</a> </h2>
        <a href="{{ route('login')}} "><img src="{{ asset('images/numeric.jpg') }}" alt="" class="image-ecole"></a>
    </div>
    <h2>Développeur web et mobile, se spécialisé en CMS WORDPRESS ou DJOOMLA ou en framework laravel, Symfony etc...</h2>
</div>   
   @endif
</div>

@endsection