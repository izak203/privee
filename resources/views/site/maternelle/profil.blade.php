@extends('layouts_ecole.app')

@section('content')
<div class="container-fluid">
<h1 class="mb-4 title_primaire_ecole">Ecole privée numéric</h1>

</div>
<div class="container mt-4">
<h2 class="mb-4" style="color:red;">Profils Enseignants Maternelles</h2>
  @include('site.profil.classe')

<h3><a href="{{ route('site.maternelle.index') }}">Go back</a></h3>
</div>
<div class="container">
    <p>{{ $users->links() }}</p>
</div>
@endsection