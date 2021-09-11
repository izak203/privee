@extends('layouts_ecole.app')


@section('content')
<div class="container">
@include('info.notification')
<h1 style="color:red;">Contact</h1>
 	<form method="post" action="{{ route('site.contacts.store') }}">
 		@csrf
     
 		<div class="form-group">
 			<label for="name">Nom: </label>
 			<input type="text" name="name" class="form-control" placeholder="Ajouter un nom de famille" value="{{old('name')}}" required>
 		</div>

 		<div class="form-group">
 			<label for="email">Email</label>
 			<input type="text" name="email" class="form-control" placeholder="Ajouter un email" value="{{old('email')}}" required>
 		</div>

 		<div class="form-group">
 			<label for="message">Message</label>
 			<textarea name="message" class="form-control" placeholder="Ajouter un message" cols="13" rows="7" required>{{old('message')}}</textarea>
 		</div>

 		<div><button type="submit" class="btn btn-primary mb-4">Envoyer votre message</button>
 		</div>
 	</div>
 </div>
 	</form>
</div>

@endsection