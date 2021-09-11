<?php

namespace App\Http\Controllers\Site;

use PDF;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizTest;
use App\Models\QuizTaken;
use App\Exports\QuizExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 1)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.maternelle.quizpetitesectionquiz', compact('quizzes'));
    }

    public function quizMoyenneSectionQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 2)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.maternelle.quizmoyennesectionquiz', compact('quizzes'));
    }

    public function quizGrandeSectionQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 3)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.maternelle.quizgrandesectionquiz', compact('quizzes'));
    }

    public function quizPrimaireCpQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 4)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.primaire.quizprimairecpquiz', compact('quizzes'));
    }

    public function quizPrimaireCeunQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 5)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.primaire.quizprimaireceunquiz', compact('quizzes'));
    }

    public function quizPrimaireCedeuxQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 6)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.primaire.quizprimairecedeuxquiz', compact('quizzes'));
    }

    public function quizPrimaireCemunQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 7)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.primaire.quizprimairecemunquiz', compact('quizzes'));
    }

    public function quizPrimaireCemdeuxQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 8)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.primaire.quizprimairecemdeuxquiz', compact('quizzes'));
    }

    public function quizCollegeSixiemeQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 9)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.college.quizcollegesixiemequiz', compact('quizzes'));
    }

    public function quizCollegeCinqiemeQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 10)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.college.quizcollegecinqiemequiz', compact('quizzes'));
    }

    public function quizCollegeQuatriemeQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 11)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.college.quizcollegequatriemequiz', compact('quizzes'));
    }

    public function quizCollegeTroisiemeQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 12)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.college.quizcollegetroisiemequiz', compact('quizzes'));
    }

    public function quizLyceeSecondeQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 13)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.lycee.quizlyceesecondequiz', compact('quizzes'));
    }

    public function quizLyceePremiereQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 14)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.lycee.quizlyceepremierequiz', compact('quizzes'));
    }

    public function quizLyceeTerminaleQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 15)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.lycee.quizlyceeterminalequiz', compact('quizzes'));
    }

    public function quizNumericHtmlCssBootstrapQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 16)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.numeric.quiznumerichtmlcssbootstrapquiz', compact('quizzes'));
    }

    public function quizNumericJavascriptQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 17)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.numeric.quiznumericjavascriptquiz', compact('quizzes'));
    }

    public function quizNumericPhpMysqlQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 18)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.numeric.quiznumericphpmysqlquiz', compact('quizzes'));
    }

    public function quizNumericPooQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 19)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.numeric.quiznumericpooquiz', compact('quizzes'));
    }

    public function quizNumericLaravelSymfonyQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 20)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.numeric.quiznumericlaravelsymfonyquiz', compact('quizzes'));
    }

    public function quizNumericWordpressDjoomlaQuiz()
    {
        $quizzes = Quiz::with('quizTaken')
                ->where('maternel_id', 21)
                ->orderBy('id', 'DESC')
                ->paginate(2);
        return view('home.quiz.numeric.quiznumericwordpressdjoomlaquiz', compact('quizzes'));
    }

    public function takeQuiz(Quiz $quiz)
    {
        $userId = Auth::user()->id;
        $quizId = $quiz->id;

        $quizExist =  QuizTaken::where([
            ['user_id', '=' , $userId],
            ['quiz_id', '=' , $quizId],
        ])->count();

        if (!$quizExist) {
            QuizTaken::create([
                'user_id' => $userId,
                'quiz_id' => $quizId,
            ]);
            return redirect()->route('show.questions', [$quiz, 0]);
        }
         else
            return redirect()->route('home.result', $quiz->id);

    }

    public function showQuestions(Quiz $quiz, $currentQuestion = 0)
    {
        $quizId = $quiz->id;
        $questionId = Question::where('quiz_id', $quizId)
            ->pluck('id')
            ->toArray();

        if ($currentQuestion < count($questionId)) {
            $question = Question::find($questionId[$currentQuestion]);
            $nextQuestion = $currentQuestion+1;
            return view('home.questions', compact('quiz', 'question', 'nextQuestion'));
        }else {
            return back()->with('error', 'Questions not found!!');
        }
    }

    public function storeAnswer(Request $request)
    {
        try {
            $userId = Auth::user()->id;
            $quizId = $request->quiz_id;
            $getCorrectAns = Question::where('id', $request->question_id)
                ->select('correct_answer')->first();

            $newQuizTest = [
                'user_id' => $userId,
                'quiz_id' => $quizId,
                'question_id' => $request->question_id,
                'selected_answer' => $request->selected_answer,
                'answer_status' => ($getCorrectAns->correct_answer == $request->selected_answer) ? 1 : 0 ,
            ];


            if(QuizTest::create($newQuizTest))
            {
                if  ($request->next_question != 0) {
                    return redirect()->route('show.questions', [$quizId, $request->next_question]);
                }

                $numberOfQuestion = Quiz::where('id', $quizId)
                    ->select('number_of_question')
                    ->first();
                $totalQuestion = $numberOfQuestion->number_of_question;

                $getAnswerStatus = QuizTest::where([
                    ['user_id', '=', $userId],
                    ['quiz_id', '=', $quizId],
                    ['answer_status', '=', 1],
                ])
                ->count();

                QuizTaken::where([
                    ['user_id', '=', $userId],
                    ['quiz_id', '=', $quizId],
                ])
                ->update(['marks' => $getAnswerStatus*5]);
                return redirect()->route('home.result', $quizId);
            }
            else
                return back()->with('error', 'Error in Inserting!');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function quizResult(Quiz $quiz)
    {
        $userId = Auth::user()->id;
        $quizId = $quiz->id;

        $questions = QuizTest::with('question')
            ->where([
                ['user_id', '=', $userId],
                ['quiz_id', '=', $quizId],
            ])
            ->get();

        $correctAnswers = $questions->filter(function ($value) {
            return $value->answer_status == 1;
        });

        $totalMarks = $quiz->marks_per_question * $quiz->number_of_question;
        $obtainMarks = $quiz->marks_per_question * count($correctAnswers);
        $findPercentage = $obtainMarks / $totalMarks * 100;
        $result = $findPercentage > $quiz->passing_marks ? 'Pass' : 'Fail';

        return view('home.result', compact( 'questions',
            'quiz',
            'correctAnswers',
            'findPercentage',
            'result'));
    }

    public function createPdf(Quiz $quiz)
    {
        $userId = Auth::user()->id;
        $quizId = $quiz->id;

        $questions = QuizTest::with('question')
            ->where([
                ['user_id', '=', $userId],
                ['quiz_id', '=', $quizId],
            ])
            ->get();

        $correctAnswers = $questions->filter(function ($value) {
            return $value->answer_status == 1;
        });

        $totalMarks = $quiz->marks_per_question * $quiz->number_of_question;
        $obtainMarks = $quiz->marks_per_question * count($correctAnswers);
        $findPercentage = $obtainMarks / $totalMarks * 100;
        $result = $findPercentage > $quiz->passing_marks ? 'Pass' : 'Fail';

        $fileName = 'quiz-result'.now()->toDateTimeString().'.pdf';
        $pdf = \PDF::loadView('pdf.quiz-result', compact(
            'quiz',
            'questions',
            'correctAnswers',
            'findPercentage',
            'result',
            'totalMarks',
    'obtainMarks'));
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(public_path().DIRECTORY_SEPARATOR.'quiz-result.pdf');
        // Finally, you can download the file using download function
        return $pdf->download($fileName);
    }

    public function export(Quiz $quiz)
    {
        $quizId = $quiz->id;
        return \Maatwebsite\Excel\Facades\Excel::download(new QuizExport($quizId), 'quiz.xlsx');
    }
}
