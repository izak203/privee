@extends('admin.admin')

@section('content')
  <div class="container mt-4">
      <h1>{{ Auth::user()->first_name }} - {{ Auth::user()->last_name }}</h1>
  </div>
@endsection