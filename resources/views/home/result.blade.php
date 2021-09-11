@extends('layouts.protected')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home.quiz.maternelle.quizpetitesectionquiz')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Results</li>
    <li class="breadcrumb-item active" aria-current="page">{{$quiz->title}}</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul>
               <li class="breadcrumb-item active" aria-current="page">Quiz: {{ $quiz->title }}</li>
               <h3>N° idntification Prof: <span class="btn btn-primary">{{ $quiz->user->numberunique }}</span> Nom: {{ $quiz->user->first_name }} &nbsp Prenom: {{ $quiz->user->last_name }}</h3>
            </ul>
        
            <div class="total pull-right">
                Total correct: {{ count($correctAnswers)}} / {{count($questions) }}
            </div>
            <table class="table result-table">
                <thead class="table-head">
                    <tr style="background: #34a714 !important;text-align: center !important;">
                        <th scope="col">Question No.</th>
                        <th scope="col">Your Answers</th>
                        <th scope="col">Correct Answers</th>
                        <th scope="col">Result</th>
                    </tr>
                </thead>
                <tbody>
                @if($questions->count() > 0)
                    @foreach($questions as $question)
                    <tr>
                        <td>{{$question->question_id}}</td>
                        <td>{{$question->selected_answer}}</td>
                        <td>{{$question->question->correct_answer}}</td>
                        <td>
                            {{ $question->question->correct_answer === $question->selected_answer
                            ? 'Correct'
                            : 'Incorrect' }}
                        </td>
                    </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="4">
                        <h4 class="result-text">
                            You are {{ $result}} in this quiz with <strong>{{ $findPercentage }} %</strong> Marks.
                        </h4>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="comments_title"> Envoyer votre resultat de quiz <span class="comments_paragraph">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}.</span></h6>
<form method="post" action="{{ route('site.profil.etudiant.image.postquizfile') }}" enctype="multipart/form-data">
@csrf

<div class="form-row">
       <div class="col-md-6">
           <div class="form-group">
           <h2><label for="first_name" class="mb-1">Nom</label></h2>
               <input type="text" name="first_name" class="form-control py-4" value="{{ Auth::user()->first_name }}" disabled>
            </div>
       </div>
       <div class="col-md-6">
           <div class="form-group">
           <h2><label for="last_name" class="mb-1">Prenom</label></h2>
               <input type="text" name="last_name" class="form-control py-4" value="{{ Auth::user()->last_name }}" disabled>
            </div>
       </div>
   </div>
   <div class="form-row">
        <div class="col-md-6">
           <div class="form-group">
           <h2><label for="email" class="mb-1">Email</label></h2>
               <input type="text" name="email" class="form-control py-4" value="{{ Auth::user()->email }}" disabled>
            </div>
       </div>
        <div class="col-md-6">
            <div class="form-group">
                <h2><label for="image">Envoyer votre fichier</label><br></h2>
               <input type="file" name="image" placeholder="Envoyer votre quiz" class="form-control py-4 btn btn-primary">
               <input  name="quiz_id"  type="hidden" value="{{ $quiz->id }}"/>
            </div>  
       </div>  
    </div> 

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Envoyer votre fichier</button>
        </div>
     
</form>
@endsection
