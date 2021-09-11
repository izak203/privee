@extends('admin.admin')


@section('content')

@include('info.notification')
<h1>Modifier le rôle d'enseignant</h1>
<form action="{{ route('admin.users.enseignant.enseignantupdate', $user->id) }}" method="POST" enctype="multipart/form-data">
@csrf 
@method('PATCH')
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="first_name" class="mb-1">Nom: </label>
                <input type="text" name="first_name" class="form-control py-4" id="first_name" value="{{ $user->first_name }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_name" class="mb-1">Prénom: </label>
                <input type="text" name="last_name" class="form-control py-4"  id="last_name" value="{{ $user->last_name }}">
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="city" class="mb-1">Ville: </label>
                <input type="text" name="city" class="form-control py-4" id="city" value="{{ $user->city }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address" class="mb-1">Adresse: </label>
                <input type="text" name="address" class="form-control py-4"  id="address" value="{{ $user->address }}">
            </div>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-4">
            <div class="form-group">
                <label for="valider_bulletin" class="mb-1">valider_bulletin: </label>
                <input type="number" name="valider_bulletin" class="form-control py-4"  id="valider_bulletin" value="{{ $user->valider_bulletin }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="tel" class="mb-1">Téléphone </label>
                <input type="text" name="tel" class="form-control py-4"  id="tel" value="{{ $user->tel }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="small mb-1" for="role_id">Role </label>
                <input type="number" name="role_id" class="form-control" value="{{ $user->role_id }}">
                 
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="small mb-1" for="category_id">Catégories </label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="diploma" class="mb-1">Diplôme: </label>
                <input type="text" name="diploma" class="form-control py-4"  id="diploma" value="{{ $user->diploma }}">
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country" class="mb-1">Pays: </label>
                <input type="text" name="country" class="form-control py-4" id="country" value="{{ $user->country }}">
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">Photo</label><br>
                <img src="{{ asset('image/users/'.$user->image) }}" alt="" width="70" height="70">
                <input type="file" name="image" class="btn btn-info" value="{{ $user->image}}">
            </div>  
       </div>  
    </div>

    <div class="form-row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="experience" class="mb-1">Expérience: </label>
                <textarea name="experience" id="experience" class="form-control" cols="30" rows="10">{{ $user->experience }}</textarea>
            </div>
        </div>
    </div>
    <div class="form-row">
         <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier le rôle d'enseignant</button>
            </div>
        </div>
    </div>
</form>

@endsection
