@extends('admin.admin')

@section('content')
@if(Auth::user()->maternel_id == 15 && Auth::user()->matiere_id == 1 && Auth::user()->role->name == "teacher")
<div class="container-fluid mt-4">
   <h1 class="mb-4 title_primaire_ecole">Lycée </h1>
   <h2>Terminale</h2>
</div>

<div class="row">
@if($quizzes->count() > 0)
                    @foreach($quizzes as $quiz)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm quiz-card">
                        <div class="card-header">
                            <h3>{{strtoupper($quiz->title)}}</h3>
                            <h3>{{strtoupper($quiz->matiere->matiere_name)}}</h3>
                            <h3>{{strtoupper($quiz->maternel->maternel_name)}}</h3>
                        </div>
                        <div class="card-body mt-3 mb-5">
                            <p style="font-size: 18px !important; font-weight: bold !important;">
                                Total Question: <b class="text-primary">{{$quiz->number_of_question}}</b><br>
                                Passing Marks: <b class="text-primary">{{$quiz->passing_marks}}</b><br>
                                Description: <strong class="text-primary">{{substr($quiz->description, 0, 10)}}</strong>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('site.profil.enseignant.quizresultresult', $quiz->id) }}" class="btn btn-primary btn-block">Take Quiz</a>
                        </div>
                    </div>
                </div>
                    @endforeach
                    @else 
                    <p>pas de quiz actuellement</p>
                @endif
        </div>    
<p style="font-size:36px;text-align:center;"><a href="{{ '/' }}">Retouner</a></p>
    @endif
@endsection