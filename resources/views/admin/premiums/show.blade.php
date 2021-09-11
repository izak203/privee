@extends('admin.admin')

@section('content')
<div class="container-fluid">
  <h1>Valider les profils enseignants</h1>
  <ul>
      <li>{{ $user->first_name }} -  {{ $user->first_name }}</li>
      <li>{{ $user->city }} - {{ $user->country }}</li>
      <li>Age: {{ $user->age }} - {{ $user->address }}</li>
      <li>Tél: {{ $user->tel }} - {{ $user->email }}</li>
      <li>{{ $user->diploma }}</li>
  </ul>
  <p class="experience"> Expérience: <br> {{ $user->experience }}</p>
  <a href="{{ route('admin.premiums.index') }}" class="btn btn-info">Go back</a>
</div>
@endsection