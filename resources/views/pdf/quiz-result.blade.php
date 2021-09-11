<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Result</title>
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
            <th><b>Quiz_Id</b></th>
            <th><b>N° Student</b></th>
            <th><b>Student_name</b></th>
            <th><b>Student_name</b></th>
            <th><b>N° Prof</b></th>
            <th><b>Prof_Nom</b></th>
            <th><b>Prof_Prenom</b></th>
            </tr>
            <tr>
            <td>
                    {{ $quiz->id }} 
               </td>
               <td>
                   <span class="btn btn-primary">{{ Auth::user()->numberunique }}</span>
               </td>
            <td>
                    {{ Auth::user()->first_name }} 
               </td>
               <td>
                    {{ Auth::user()->last_name }} 
               </td>
              
               <td>
                   <span class="btn btn-primary">{{ $quiz->user->numberunique }}</span>
               </td>
               <td>
                    {{ $quiz->user->first_name }} 
               </td> 
               <td>
                   {{ $quiz->user->last_name }}
                </td>
                        
            </tr>
    </table>
    <table width="100%">
        <tr>
            
            <td width="30%">
                Title: <b>{{ $quiz->title }}</b><br>
                Date: {{ $quiz->created_at }}
            </td>
        </tr>
       
        <tr>
            <td colspan="2">
                <table width="100%">
                    <tr style="background: black; color: white">
                        <th><b>Question No.</b></th>
                        <th><b>Your Answers</b></th>
                        <th><b>Correct Answers</b></th>
                        <th><b>Result</b></th>
                    </tr>
                    @foreach($questions as $question)
                        <tr style="text-align: center">
                            <td>{{$question->question_id}}</td>
                            <td>{{$question->selected_answer}}</td>
                            <td>{{$question->question->correct_answer}}</td>
                            <td>
                                @if($question->question->correct_answer === $question->selected_answer)
                                    <strong style="color: green; font-weight: bold">Correct</strong>
                                @else
                                    <strong style="color: red; font-weight: bold;">Incorrect</strong>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Total Correct</th>
                        <th>Total correct: {{ count($correctAnswers)}} / {{count($questions) }}</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Mark In %</th>
                        <th>{{ $findPercentage }}%</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Result Status</th>
                        <th>{{ $result }}</th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <img src="{{ public_path('images/signature.jpg') }}" style="width: 100px; height: 100px;linear-gradient(to bottom, #33ccff 0%, #cc9900 100%);">
</body>
</html>


