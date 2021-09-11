@extends('admin.admin')

@section('content')

@include('info.notification')
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
               <div class="col-md-12">
                    <div class="form-group">
                       <label for="suggestion" class="mb-4">Remarque </label>
                      <textarea name="suggestion" class="form-control" id="suggestion" cols="30" rows="10"></textarea>
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Soummettre la note</button>
                    </div>
               </div>
               </div>
          </form>
 
@endsection