@extends('admin.admin')

@section('content')

<table class="table table-condensed">
    <thead>
        <tr style="background-color:tomato;color:#fff;">
        <th>ID</th>
        <th>USER_ID</th>
        <th>Unique Number</th>
        <th>First_name</th>
        <th>Last_name</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach($questions  as $question)
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->user_id }}</td>
            <td><span class="btn btn-primary">{{ $question->user->numberunique }}</span> </td>
            <td><a href="{{ route('site.profil.enseignant.quizstudentteacher', $quiz->id) }}">{{ $question->user->first_name }}</a></td>
            <td>{{ $question->user->last_name }}</td>
            <td></td>
        </tr>
       @endforeach
    </tbody>
  
</table>
@endsection