@extends('admin.admin')

@section('content')

<div class="container-fluid">
@include('info.notification')

<h1>User Profil Etudiant</h1>
    <table class="table table-condensed">
        <thead>
            <tr class="card-table">
                <th>
                  <input type="checkbox" id="chk">
                </th>
                <th>ID</th>
                <th>Payment_ID</th>
                <th>
                <input type="checkbox" id="validerbulletin">
                    Valider Bulletin
                </th>

                <th>
                <input type="checkbox" id="bulletin_id">
                    Bulletin Id
                </th>
                <!--<th>IMG</th>--> 
                <th>First_name</th>
                <th>Last_Name</th>
                <th>Age</th>
                <th>Rôle_id</th>
                <th>Identite_Id</th>
                <th>NumberUnique</th>
                <th>Amout</th>
                <th>Recu</th>
                <th>Editer</th>
                <th> Supprimer</th>
            </tr>
        </thead>
       
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>
                    <input type="checkbox" name="id[]" value="{{ $user->id }}" class="id">
                </td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->payment_id }}</td>
                <td> <input type="checkbox" name="valider_bulletin[]" value="{{ $user->valider_bulletin }}" class="valider_bulletin">{{ $user->valider_bulletin }}</td>
                <td><input type="checkbox" name="bulletin_id[]" value="{{ $user->bulletin_id }}" class="bulletin_id">{{ $user->bulletin_id }}</td>
               <!-- <td>@if($user->image)
                     <img src="{{ asset('image/users/' .$user->image) }}" style="border-radius:50%;position:absolute;" alt="" width="50" height="50"><br><br><br><br>
                    @else
                <img src="{{ asset('images/users/default.png') }}" alt="" style="border-radius:50%;" width="50" height="50" />
                 @endif</td>--> 
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->role_id }}</td>
                <td>{{ $user->identite_id }}</td>
                <td>{{ $user->numberunique }}</td>
                @if($user->payment)
                <td>{{ $user->payment->amount }} €</td>
                <td><a href="{{ $user->payment->receipt_url }}" class="btn btn-primary">Reçu Inscription</a></td>
               @endif 
               <td><a href="{{ route('admin.users.etudiant.validerbulletin', $user->id) }}" class="btn btn-primary">Valider Bulletin</a></td>
              <td>
                <form action="{{ route('admin.users.etudiant.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
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

