@extends('layouts.protected')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('quiz.index') }}">Quiz List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Quiz</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('quiz.store') }}" method="post">
                @csrf
            <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="maternel_id">Choix de classe </label>
                            <select name="maternel_id" id="maternel_id" class="form-control">
                                @foreach($maternels as $maternel)
                                <option value="{{ $maternel->id }}">{{ $maternel->maternel_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="matiere_id">Matiere </label>
                    <select name="matiere_id" id="matiere_id" class="form-control">
                        @foreach($matieres as $matiere)
                        <option value="{{ $matiere->id }}">{{ $matiere->matiere_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title" placeholder="">
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-sm-12">
                        <label for="number">Number of Questions</label>
                        <input type="number" id="number" class="form-control" name="number_of_question">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="marksPerQuestion">Marks Per Questions</label>
                        <input type="number" id="marksPerQuestion" class="form-control" name="marks_per_question">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="marks">Passing Marks</label>
                        <input type="number" id="marks" class="form-control" name="passing_marks">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="public">Publish Quiz</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publish" id="publish-yes" value="1">
                        <label class="form-check-label" for="publish-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publish" id="publish-no" value="0" checked>
                        <label class="form-check-label" for="publish-no">No</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection
