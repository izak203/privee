@extends('layouts.protected')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('quiz.index') }}">Quiz List</a></li>
    <li class="breadcrumb-item">{{$quiz->title}}</li>
    <li class="breadcrumb-item active" aria-current="page">Add Question</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($totalQuestions <= $quiz->number_of_question)
                <h1>Question # {{$totalQuestions}}</h1>
                <form action="{{ route('question.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                    <div class="form-group">
                        <label for=" question ">Question:</label>
                        <input type="text" id="title" class="form-control" name="question" placeholder="">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-12">
                            <label for="option1">Option 1</label>
                            <input type="text" id="option1" class="form-control" name="option_1" required>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="option2">Option 2</label>
                            <input type="text" id="option2" class="form-control" name="option_2" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-12">
                            <label for="option3">Option 3</label>
                            <input type="text" id="option3" class="form-control" name="option_3" required>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="option4">Option 4</label>
                            <input type="text" id="option4" class="form-control" name="option_4" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="answer">Correct Answer:</label>
                        <br>
                        <select name="correct_answer" id="answer" required>
                            <option selected hidden>Select Correct Answer</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm float-right">
                        Save and {{$totalQuestions === $quiz->number_of_question
                        ? 'Publish Quiz'
                        : 'Next'
                        }}
                    </button>
                </form>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 150px;">
                                <i class="fas fa-check-circle text-success fa-5x"></i>
                                <h3 class="card-title mt-3">
                                    This quizzed is <strong class="text-success font-weight-bold">published</strong> now.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @forelse ($quiz->images as $image)
<div class="card mt-3 mb-3">
  <div class="row no-gutters">
    <div class="col-md-12 col-sm-12 col-12">
         <h5  class="mb-3" style="color:red;"> Fichier de </h5>
          <p class="comments_paragraph"> <span class="comments_paragraph_user">@if($image->user->image)
             <img src="{{ asset('image/users/' .$image->user->image) }}" style="border-radius:50%;" alt="" width="70" height="70">
                @else
                  <img src="/image/users/default.png" alt="" style="border-radius:50%;" width="70" height="70" />
                @endif
                <p><a href="{{ url('image/students/' .$image->image) }}"><img src="{{ asset('images/pdf.jpg') }}" alt="" width="30" height="30">Telecharger votre fichier</a></p>
                &nbsp&nbspDevoir de&nbsp</span> |&nbsp <span class="btn btn-primary">{{ $image->user->first_name }} {{ $image->user->category->category_name }} {{ $image->user->maternel->maternel_name }} N° Identification unique: {{ $image->user->numberunique }}</span></p>
              
    </div>
  </div>
</div>
  @empty
    <p class="paragraph_title title_responsive" style="color:#fff;">Cette annonce n'a aucun commentaire.</p>

 @endforelse
@endsection
