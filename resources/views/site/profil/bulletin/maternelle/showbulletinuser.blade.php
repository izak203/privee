@extends('admin.admin')

@section('content')

@include('info.notification')

  <h1>TEST VUE</h1>
  <table class="table table-condensed">
      <thead>
          <tr>
              <th>#ID</th>
              <th>NumberUniqueStudents</th>
              <th>First_name</th>
              <th>last_name</th>
              <th>Classe</th>
              <th>Category</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->numberunique }}</td>
              <td><a href="{{ route('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematernelun') }}" class="btn btn-primary">{{ $user->first_name }}</a></td>
              <td>{{ $user->last_name }}</td>
              @if($user->maternel)
              <td>{{ $user->maternel->maternel_name }}</td>
              @endif
              @if($user->category)
              <td>{{ $user->category->category_name }}</td>
              @endif
          </tr>
      </tbody>
  </table>
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
            <th>Editer</th>
        </tr>
    </thead>
    <tbody>
    @foreach($user->moyennes as $moyenne)
        <tr>
            <td>{{ $moyenne->id }}</td>
            <td>{{ $moyenne->user->id }}</td>
            <td>{{ $moyenne->user->numberunique }}</td>
            <td>{{ $moyenne->user->first_name }}</td>
            <td>{{ $moyenne->user->last_name }}</td>
            <td>{{ $moyenne->type->type_name }}</td>
            <td>{{ $moyenne->bulletin->trimestre_name }}</td>
            <td>{{ $moyenne->title }}</td>
            <td>{{ $moyenne->francais }}</td>
            <td>{{ Str::limit($moyenne->suggestion, 40) }}</td>
            <td><a class="btn btn-primary" href="{{ route('site.profil.bulletin.maternelle.create') }}">Ajouter note</a></td>
        </tr>
    @endforeach
    </tbody>
 </table>

 <h1>Ajouter la note</h1>
    <form action="{{ route('site.profil.bulletin.maternelle.store') }}" method="post">
        @csrf
          <div class="row"> 
               <div class="col-md-6">
                   <div class="form-group">
                       <label for="type_id" class="mb-4">Type </label>
                       <select name="type_id" id="type_id" class="form-control">
                           @foreach($types as $type)
                           <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                           @endforeach
                       </select>
                    </div>
               </div>
               <div class="col-md-6">
               <div class="form-group">
                       <label for="bulletin_id" class="mb-4">Type </label>
                       <select name="bulletin_id" id="bulletin_id" class="form-control">
                           @foreach($bulletins as $bulletin)
                           <option value="{{ $bulletin->id }}">{{ $bulletin->trimestre_name }}</option>
                           @endforeach
                       </select>
                    </div>
               </div>
              
               <div class="col-md-6">
                   <div class="form-group">
                       <label for="title" class="mb-4">Dicipline </label>
                       <input type="text" id="title" class="form-control py-4" name="title" placeholder="Ajouter le titre Ex: Francçais, Mathematique, etc...">
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="form-group">
                       <label for="francais" class="mb-4">Ajouter la note </label>
                       <input type="text" id="francais" class="form-control py-4" name="francais" placeholder="Ajouter la note">
                    </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <label for="coefficiant" class="mb-4">Ajouter le coefficiant </label>
                       <input type="text" id="coefficiant" class="form-control py-4" name="coefficiant" placeholder="Ajouter le coefficiant Français 5, Mathematique 5, Physique 5, les autres 2 etc...">
                    </div>
               </div>
               
               <div class="col-md-6">
                   <div class="form-group">
                       <label for="total" class="mb-4">Total </label>
                       <input type="text" id="total" class="form-control py-4" name="total" placeholder="Ajouter le titre Ex: Francçais, Mathematique, etc...">
                    </div>
               </div>
               <div class="col-md-12">
                    <div class="form-group">
                       <label for="suggestion" class="mb-4">Remarque </label>
                      <textarea name="suggestion" class="form-control" id="suggestion" cols="30" rows="10"></textarea>
                      <input  name="user_id"  type="hidden" value="{{ $user->id }}"/>
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Ajouter la note</button>
                    </div>
               </div>
               </div>
          </form>
 
@endsection