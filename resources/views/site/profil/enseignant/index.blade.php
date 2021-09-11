@extends('admin.admin')

@section('content')

@include('info.notification')
<h1>Profil</h1>
    <table class="table table-condensed">
        <thead>
            <tr class="card-table">
                <th>ID</th>
                <th>IMG</th>
                <th>First_name</th>
                <th>Last_Name</th>
                <th>Age</th>
                <th>Diplôme</th>
                <th>Expérience</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>@if(Auth::user()->image)
                     <img src="/image/users/{{ Auth::user()->image }}" style="border-radius:50%;" alt="" width="100" height="100"><br><br><br><br>
                    @else
                <img src="/images/users/default.png" alt="" style="border-radius:50%;" width="50" height="50" />
                 @endif</td>
                <td><a href="">{{ $user->first_name }}</a></td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->diploma }}</td>
                <td>{{ Str::limit($user->experience, 100) }}</td>
                <td><a href="{{ route('site.profil.enseignant.edit', $user->id) }}" class="btn btn-secondary">Editer</a></td>
                <td>
                   <form action="{{ route('site.profil.enseignant.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('DELETE')

                    <div class="form-row">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </div>
                   </form>
              </td>
            </tr>
        </tbody>
    </table>
</div>

@if(Auth::user()->premiums > 0)
<div class="container-fluid">
       <h2><a href="{{ route('site.profil.maternel.addcreate') }}">Ajouter</a></h2>
<table class="table table-condensed">
        <thead>
            <tr class="card-table">
                <th>ID</th>
                <th>Vidéo</th>
                <th>IMG</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
           @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{!! $product->video_html !!}</td>
                <td>@if($product->fichier)
                    <img src="{{ asset('image/fichiers/' .$product->fichier) }}" style="border-radius:50%;" alt="" width="50" height="50"><br><br><br><br>
                    @else
                   <img src="/images/users/default.png" alt="" style="border-radius:50%;" width="50" height="50" />
                 @endif</td>
                <td><a href="{{ route('site.profil.maternel.showcreate', $product->id) }}"> {{ $product->title }}</a></td>
                <td>{{ Str::limit($product->description, 100) }}</td>
                <td><a href="{{ route('site.profil.maternel.editcreate', $product->id) }}" class="btn btn-secondary">Editer</a></td>
                <td>
                <form action="{{ route('site.profil.maternel.deletedestroy', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('DELETE')
                    <div class="form-row">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>{{ $products->links() }}</p>

@else 
<div class="container-fluid">
<h1 class="mb-4 title_primaire_ecole">Mr, Mme, {{ Auth::user()->first_name }} - {{ Auth::user()->last_name }},  Votre dossier est en étude, si il est validé, vous pouvez commencer à ajouter les cours. Toute l'équipe vous remercie</h1>
</div>

@endif

@endsection