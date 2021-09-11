@extends('admin.admin')

@section('content')

@include('info.notification')

    <h1>Bulltein d'elève</h1>
    <div class="row">
    <div class="col-md-6">
    <h2><img src="{{ asset('images/manioc.jpg') }}" alt="" with="50" height="50" style="border-radius:50%">
            ecole privée numérique</h2>
            <p>123 ROUTE DE MONT2LIER </p>
            <P>VALENCE FRANCE</P>
        </div>
       @if(Auth::user() && Auth::user()->subscribed('cashier'))
        <div class="col-md-6">
            <h2>{{ Auth::user()->first_name }} -{{ Auth::user()->last_name }} </h2>
            <p>{{ Auth::user()->category->category_name }}</p>
        </div>
    </div>
 
    <table class="table table-condensed">
    <thead>
        <tr>
            <th>#ID</th>
            <th>#USER_ID</th>
            <th>NumberUnique</th>
            <th>Fist_name</th>
            <th>Last_name</th>
            <th>Category</th>
            <th>Trimestre</th>
            <th>Titre</th>
            <th>Notes</th>
            <th>Suggestion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($user->moyennes as $moyenne)
     @if($moyenne->type_id == 2)
        <tr>
            <td>{{ $moyenne->id }}</td>
            <td>{{ $moyenne->user->id }}</td>
            <td > <span class="btn btn-primary">{{ $moyenne->user->numberunique }}</span></td>
            <td>{{ $moyenne->user->first_name }}</td>
            <td>{{ $moyenne->user->last_name }}</td>
            <td>{{ $moyenne->type->type_name }}</td>
            <td><span class="btn btn-primary">{{ $moyenne->bulletin->trimestre_name }}</span></td>
            <td>{{ $moyenne->title }}</td>
            <td>{{ $moyenne->francais }}</td>
            <td>{{ Str::limit($moyenne->suggestion, 40) }}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
 </table>
 
    @endif

@endsection