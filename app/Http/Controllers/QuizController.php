<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Matiere;
use App\Models\Maternel;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminQuizStore;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $quizzes = $user->quizzes()->orderBy('id', 'DESC')->paginate(5);
        
        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maternels = Maternel::all();
        $matieres = Matiere::all();

        return view('admin.quizzes.create', compact('maternels', 'matieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminQuizStore $request)
    {
        try {
            $user = Auth::user()->id;

            $newQuiz = [
              'title' => $request->title,
              'user_id' => $user,
              'maternel_id' => $request->maternel_id,
              'matiere_id' => $request->matiere_id,
              'number_of_question' => $request->number_of_question,
              'marks_per_question' => $request->marks_per_question,
              'passing_marks' => $request->passing_marks,
              'description' => $request->description,
              'publish' => $request->publish,
            ];

            $quiz = Quiz::create($newQuiz);
            if($quiz)
                return back()->with('success', 'Quiz are Successfully Added');
            else
                return back()->with('error', 'Error in Inserting Quiz!');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        $quizId = $quiz->id;
        $totalQuestions = Question::where('quiz_id', $quizId)->count()+1;
        return view('admin.quizzes.question', compact('quiz' , 'totalQuestions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $maternels = Maternel::all();
        $matieres = Matiere::all();

        return view('admin.quizzes.edit', compact('quiz', 'maternels', 'matieres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        try{
            $quiz->maternel_id = $request->maternel_id;
            $quiz->matiere_id = $request->matiere_id;
            $quiz->title = $request->title;
            $quiz->number_of_question = $request->number_of_question;
            $quiz->marks_per_question = $request->marks_per_question;
            $quiz->passing_marks = $request->passing_marks;
            $quiz->description = $request->description;
            $quiz->publish = $request->publish;

            if($quiz->save())
                return back()->with('success', 'This Quiz Update Successfully');
            else
                return back()->with('error', 'Error in Updating Quiz!');
        } catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
