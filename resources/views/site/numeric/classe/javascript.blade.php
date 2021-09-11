@extends('layouts_ecole.app')

@section('content')
@if(Auth::user()->maternel_id == 17 && Auth::user()->subscribed('cashier'))
<div class="container-fluid mt-4">
   <h1 class="mb-4 title_primaire_ecole">Numéric</h1>
   <h2>JAVASCRYPT</h2>
</div>
<div class="container mt-4">

<div class="row">
   @include('site.include')
   
   <h1><a href="{{ route('home.quiz.numeric.quiznumericjavascriptquiz') }}" class="btn btn-primary">Repondre les Quiz test</a></h1>
  
   @else 
<p style="font-size:36px;text-align:center;background-color:tomato;color:#fff;height:100px;line-height:100px;"><a href="{{ route('site.numeric.index') }}"><span style="font-size:36px;text-align:center;">{{ Auth::user()->first_name}} - {{ Auth::user()->last_name}}</span> Retourner dans votre classe s'il vous plait!</a></p>
@endif
</div>
<p>{{ $products->links() }}</p>

</div>
@endsection