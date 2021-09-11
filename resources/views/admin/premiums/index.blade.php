@extends('admin.admin')

@section('content')
<div class="container-fluid">
  <h1>Valider les profils enseignants</h1>
  
  <div class="container mt-4">
  @include('info.notification')
     <div class="row">

       @foreach($users as $user)
          
          <div class="col-md-12">
            <form method="post" action="{{ route('admin.premiums.update', $user->id) }}">
                @csrf
                 @method('PATCH')
                
                 <label for="premiums" class="checkbox">
                 
                 <h4 style="color: tomato;"><input type="checkbox"  name="premiums"  onChange="this.form.submit()"><a href="{{ route('admin.premiums.show', $user->id) }}">&nbsp{{ $user->first_name }}</a> </h4>
                
                </label>
                <p><img src="{{ asset('image/users/'.$user->image )}}" width="100" height="100" alt="" /></p>
                <h4 style="color:red;" class="mt-2">{{ $user->identite->identite_name }} - {{ $user->category->category_name }}</h4>
                  <p>{{ Str::limit( $user->experience, 100) }}</p>
                <p class="date_publication">Profil ajouté, {{ $user->created_at->diffForHumans() }}</p>
               
              </form>
         <form method="post" action="{{ route('admin.premiums.destroy', $user->id) }}">
         @method('DELETE')
        @csrf

        <div>
          <button type="submit" class="btn btn-danger"><svg class="bi bi-trash-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
       </svg></button>
        </div>

              </form><br>
            </div>
      
    @endforeach

  </div>
  </div>
  <div class="container">
  <p>{{ $users->links() }}</p>
  </div> 
@endsection
