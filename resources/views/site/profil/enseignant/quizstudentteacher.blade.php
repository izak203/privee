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
                        <td><input type="text" nama="user_id" value="{{ $question->user_id }}"></td>
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