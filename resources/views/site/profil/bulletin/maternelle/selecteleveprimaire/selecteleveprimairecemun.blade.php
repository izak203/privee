@extends('admin.admin')

@section('content')

@include('info.notification')
  <h1>Les elèves de maternelles, attribués leurs notes</h1>
  <table class="table table-condensed">
      <thead>
          <tr>
              <th>#ID</th>
              <th>NumberUniqueStudents</th>
              <th>First_name</th>
              <th>last_name</th>
              <th>Classe</th>
              <th>Category</th>
              <th>Matiere</th>
              <th>Ajouter notes</th>
             
          </tr>
      </thead>
      
      <tbody>
          @foreach($users as $user)
          @if(Auth::user()->category_id == 2 && Auth::user()->maternel_id == 7 && Auth::user()->role->name == 'teacher')
            @if($user->category_id == 2 && $user->maternel_id == 7)

               @include('site.profil.bulletin.maternelle.includenote')
               
          @endif
          @endif
    
         @endforeach 
      </tbody>
  </table>
  
@endsection


