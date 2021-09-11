<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Bulletin deuxième trimestre</title>
</head>
<body>
    <div class="container">
        <table style="width: 100%">
          <tr>
              <td style="width:30%"> <img src="{{ public_path('images/manioc.jpg') }}" style="width: 100px; height: 100px"></td>
              
              <td style="width:70%">Ecole Privée Numéric<br>
              123 ROUTE DE MONTELIER<br>
              26000 Valence<br>
              Tél: 0783600336<br>
              Mail: ecoleprivenumeric@gmail.com<br>
              www.ecoleprivenumeric.com</td>
          </tr>
        </table>
     
    </div>
    <table with="100">
    <tr>
            <th><b>N° Student</b></th>
            <th><b>Student_name</b></th>
            <th><b>Student_name</b></th>
            </tr>
            <tr>
               <td>
                   <span class="btn btn-primary">{{ Auth::user()->numberunique }}</span>
               </td>
            <td>
                    {{ Auth::user()->first_name }} 
               </td>
               <td>
                    {{ Auth::user()->last_name }} 
               </td>
                        
            </tr>
    </table>
    <table width="100%">
        <tr>
            
            <td width="30%">
                Title: <b>title</b><br>
                Date: 
            </td>
        </tr>
       
        <tr>
            <td colspan="2">
                <table width="100%">
                    <tr style="background: black; color: white">
                        <th><b>Id</b></th>
                        <th><b>Titre</b></th>
                        <th><b>Notes</b></th>
                        <th><b>Coefficiants</b></th>
                        <th><b>Total Coefficiants</b></th>
                        <th><b>Suggestion</b></th>
                    </tr>
                    @forelse($user->moyennes as $moyenne)
                    @if($moyenne->type_id === 3 && $moyenne->bulletin_id === 2)
                        <tr>
                            <td>{{ $moyenne->id }}</td>
                            <!--<td>{{ $moyenne->user->id }}</td> 
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
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>SOMME</th>
                        <th>{{ $bulletins }}</th>
                        <th>{{ $coefficiants }}</th>
                        <th><h4 style="background-color:teal;color:#fff;text-align:center;"> {{ $sommetotal }}<h4></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Moyenne générale</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>{{ (round($total, 2)) }}</th>
                        <th>@if((round($total, 2)) >= 10) Bravo {{ Auth::user()->first_name }} - {{ Auth::user()->last_name }}, Vous avez effectué un travai formidable @else Des efforts restent à effectuées @endif</th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

<P>@if((round($total, 2)) >= 10) {{ Auth::user()->first_name }}, Vous avez bien travaillé <span style="color:red;">Bravo</span> vous êtes un très bon elève toute l'équipe de l'école privé numéric vous souhaite une meilleur continuité @elseif($total == 0) Il faut patienter @else Désolé {{ Auth::user()->first_name }} pouvez effectuer des efforts @endif</p>

    <img src="{{ public_path('images/signature.jpg') }}" style="width: 100px; height: 100px;linear-gradient(to bottom, #33ccff 0%, #cc9900 100%);">
</body>
</html>
