@extends('admin.admin')

@section('content')

<div class="container-fluid">
@include('info.notification')

<h1>User Profil Enseignant</h1>
    <table class="table table-condensed">
        <thead>
            <tr class="card-table">
                <th>ID</th>
                <th>IMG</th>
                <th>First_name</th>
                <th>Last_Name</th>
                <th>NumberUnique</th>
                <th>Rôle_Id</th>
                <th>Identite_id</th>
                <th>Edit</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>@if($user->image)
                     <img src="{{ asset('image/users/' .$user->image) }}" style="border-radius:50%;position:absolute;" alt="" width="50" height="50"><br><br><br><br>
                    @else
                <img src="{{ asset('images/users/default.png') }}" alt="" style="border-radius:50%;" width="50" height="50" />
                 @endif</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->numberunique }}</td>
                <td>{{ $user->role_id }}</td>
                <td>{{ $user->identite_id }}</td>
              </td>
              <td><a class="btn btn-secondary" href="{{ route('admin.users.enseignant.enseignantedit', $user->id) }}">Editer</a></td>
              <td>
                <form action="{{ route('admin.users.enseignant.destroyenseignant', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('DELETE')
                    <div class="form-row">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
              </td>
            </tr>
            @empty 
            <p>Aucun user trouvé sur la base de données.</p>
            @endforelse
        </tbody>
    </table>
    <p>{{ $users->links() }}</p>
</div>

@endsection