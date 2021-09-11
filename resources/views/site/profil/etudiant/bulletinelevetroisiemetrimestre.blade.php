@extends('admin.admin')

@section('content')

@include('info.notification')

<h1>Bulletin d'elève <a href="{{ route('pdf.troisiemetrimestre-result') }}" class="btn btn-primary">GENERER PDF</a> </h1>
<div class="row">
    <div class="col-md-6">
    <h2><img src="{{ asset('images/manioc.jpg') }}" alt="" with="50" height="50" style="border-radius:50%">
            ecole privée numérique</h2>
            <p>123 ROUTE DE MONTELIER </p>
            <P>VALENCE FRANCE</P>
        </div>
       @if(Auth::user() && Auth::user()->subscribed('cashier'))
        <div class="col-md-6">
            <h2>{{ Auth::user()->first_name }} -{{ Auth::user()->last_name }} </h2>
            <p>Classe: {{ Auth::user()->category->category_name }} - {{ Auth::user()->maternel->maternel_name }}</p>
            <p class="btn btn-primary mt-4 mb-4">Trimestre: {{ Auth::user()->bulletin->trimestre_name }} &nbsp&nbspN° d'identification: {{ Auth::user()->numberunique }}</p>

            <!-- Ajouter la relation bulletin et user ici pour affichier le trimestre<p><span class="btn btn-primary"></span></p>--> 
        </div>
    </div>
   
    <table class="table table-condensed">
    <thead>
        <tr>
            <!--<th>#ID</th>
            <th>#USER_ID</th>
            <th>Fist_name</th>
            <th>Last_name</th>
            <th>Category</th>--> 
            <th>Dicipline</th>
            <th>Notes</th>
            <th>Coefficiant</th>
            <th>Total</th>
            <th>Suggestion</th>
        </tr>
    </thead>
    
    <tbody>
    @forelse($user->moyennes as $moyenne)
      @if($moyenne->type_id === 3 && $moyenne->bulletin_id === 3)
        <tr>
            <!--<td>{{ $moyenne->id }}</td>
            <td>{{ $moyenne->user->id }}</td> 
            <td>{{ $moyenne->user->first_name }}</td>
            <td>{{ $moyenne->user->last_name }}</td>--> 
            <!--<td>{{ $moyenne->type->type_name }}</td>--> 
            <td>{{ $moyenne->title }}  </td>
            <td>{{ $moyenne->francais}}</td>
            <td>{{ $moyenne->coefficiant }}</td>
            <td>{{ $moyenne->francais * $moyenne->coefficiant }}</td>
            <td>{{ Str::limit($moyenne->suggestion, 40) }}</td>
            
        </tr>
        @endif
        
    </tbody>
    @empty 
        <h2>Pas de bulletin pour le moment</h2>
    @endforelse 
    
    <tr>
       <td>SOMME</td>
        <td>{{ $bulletins }}</td>
        <td>{{ $coefficiants }}</td>
        <td><h4 style="background-color:teal;color:#fff;text-align:center;"> {{ $sommetotal }}<h4></td>
       
       
    </tr>
    <tr class="mt-4">
    <td><h2 style="background-color:teal;color:#fff;text-algin:center;">Moyenne générale</h2> </td>
    <td></td>
    <td></td>
    <td><h2 style="background-color:teal;color:#fff;text-align:center;"> {{ (round($total, 2)) }} <h2></td>
    <td><h2 style="background-color:teal;color:#fff;text-align:center;"> @if((round($total, 2)) >= 10)  Admis Bravo {{ Auth::user()->first_name }} - {{ Auth::user()->last_name }}@elseif($total == 0) pasde moyenne @else Redoublant @endif</h2></td>  
   </tr>
</table>
@endif
<P>@if((round($total, 2)) >= 10) {{ Auth::user()->first_name }}, Vous avez bien travaillé <span style="color:red;">Bravo</span> vous êtes un très bon elève toute l'équipe de l'école privé numéric vous une meilleur continuite à la classe suivante @elseif($total == 0) Il faut patienter @else Désolé {{ Auth::user()->first_name }}, Vous êtes rédoublé, ne vous inquiète pas, l'année prochaine vous serez admise en premier @endif</p>

@endsection