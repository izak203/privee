@extends('admin.admin')


@section('content')
<div class="container">
@include('info.notification')
<h1>Modifier le rôle d'enseignant</h1>
<form action="{{ route('admin.users.etudiant.validerbulletinupdate', $user->id) }}" method="POST">
@csrf 
@method('PATCH')
   <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="valider_bulletin" class="mb-1">valider_bulletin: </label>
                <input type="number" name="valider_bulletin" multiple class="form-control py-4" value="{{ $user->valider_bulletin }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="small mb-1" for="bulletin_id">Bulletin_id </label>
                <input type="number" name="bulletin_id" multiple class="form-control py-4" value="{{ $user->bulletin_id }}">   
            </div>
        </div>
    </div> 
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Valider Bulletin</button>
    </div>
</form>
    
</div>

@endsection
