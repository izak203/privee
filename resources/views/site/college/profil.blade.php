@extends('layouts_ecole.app')

@section('content')
<div class="container-fluid mt-4">
   <h1 class="mb-4 title_primaire_ecole">Ecole privée numéric</h1>
<h2>Profils Enseignants Collège</h2>
@include('site.profil.classe')
</div>
<h3><a href="{{ route('site.college.index') }}">Go back</a></h3>
@endsection