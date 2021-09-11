<?php

namespace App\Http\Controllers\Profil;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Image;
use App\Models\Matiere;
use App\Models\Product;
use App\Models\Category;
use App\Models\Identite;
use App\Models\Maternel;
use App\Models\QuizTest;
use App\Models\QuizTaken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEnseignantRequest;
use App\Http\Requests\ProductRequest;

class ProfilEnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $products = $user->products()->orderBy('id', 'DESC')->paginate(1);

        return view('site.profil.enseignant.index', compact('user', 'products'));
        //
    }

    public function findMaternelName(Request $request)
    {
        $data = Maternel::select('maternel_name','id')->where('category_id', $request->id)->get();

        return response()->json($data);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $identites = Identite::all();
        $maternels = Maternel::all();
        $matieres = Matiere::all();
        
        return view('site.profil.enseignant.create', compact('categories', 'identites', 'maternels', 'matieres'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserEnseignantRequest $request)
    {
       /* foreach(($request->get('maternel_id')) as $m)
          {
          }*/
        $user = new User();
        $user->category_id = $request->category_id;
        $user->identite_id = $request->identite_id;
        $user->maternel_id = $request->maternel_id;
        //$user->maternel_id=$m;
        //$user->maternel_id = implode(',', $request['maternel_id']);
        $user->matiere_id = $request->matiere_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->postalcode = $request->postalcode;
        $user->numberunique = random_int(12345678, 123456789);
        $user->city = $request->city;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->tel = $request->tel;
        $user->diploma = $request->diploma;
        $user->experience = $request->experience;
        $user->birth = $request->birth;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image('image', $user);
        $user->save();
    
        return redirect()->route('site.profil.enseignant.index')->withSuccess('Votre profil est ajouté avec succès');
        //dd($request->all());
        //
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function QuizStudentResult(Quiz $quiz)
    {
        $questions = QuizTaken::with('user')->orderBy('id', 'DESC')->paginate(4);

        return view('site.profil.enseignant.quizstudent', compact('questions', 'quiz')); 
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function QuizStudentResultTeacher(Quiz $quiz)
    {
        //$userId = Auth::user()->id;
        $quizId = $quiz->id;

        $questions = QuizTest::with('question')
            ->where([
            ['user_id', 4 /*'=', $userId*/],
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

        return view('site.profil.enseignant.quizstudentteacher', compact('questions',
            'quiz',
            'correctAnswers',
            'findPercentage',
            'result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('site.profil.enseignant.show', compact('user'));
        //
    }

    public function QuizStudent()
    {
        $user = Auth::user();
        $quizzes  = $user->quizzes()
        ->where('publish', 1)
        ->where('matiere_id', 1)
        ->where('maternel_id', 15)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.profil.enseignant.quizresultstudent', compact('quizzes', 'user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('site.profil.enseignant.edit', compact('user'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEnseignantRequest $request, User $user)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->city = $request->city;
        $user->postalcode = $request->postalcode;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->tel = $request->tel;
        $user->diploma = $request->diploma;
        $user->experience = $request->experience;
        $user->image('image', $user);
        $user->save();

        return redirect()->route('site.profil.enseignant.index')->withSecondary('Votre profil est modifié avec succès');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('site.profil.enseignant.index')->withDanger('Votre profil est supprimé avec succès, pour se connecter, il faut créer un autre compte');
        //
    }

    public function addcreate()
    {
    return view('site.profil.maternel.addcreate');
    }

    public function addstore(ProductRequest $request)
    {
        $product = new Product();
        $product->category_id = auth()->check() ? auth()->user()->category_id :$request->category_id;
        $product->matiere_id = auth()->check() ? auth()->user()->matiere_id :$request->matiere_id;
        $product->maternel_id = auth()->check() ? auth()->user()->maternel_id :$request->maternel_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->sub_title = $request->sub_title;
        $product->body = $request->body;
        $product->second_title = $request->second_title;
        $product->excerpt = $request->excerpt;
        $product->third_title = $request->third_title;
        $product->main = $request->main;
        $product->date_product = $request->date_product;
        $product->video = $request->video;
        $product->image('image', $product);
        $product->photo('photo', $product);
        $product->media('media', $product);
        $product->upload('upload', $product);
        $product->fichier('fichier', $product);
        $product->user_id = Auth::user()->id;
        $product->save();

        return redirect()->route('site.profil.enseignant.index')->withSuccess('Votre cours est ajouté avec succès!');

    }

    public function showcreate(Product $product)
    {
        
        return view('site.profil.maternel.showcreate', compact('product'));
    }

    public function editcreate(Product $product)
    {

    return view('site.profil.maternel.editcreate', compact('product'));
    }

    public function editupdate(ProductRequest $request, Product $product)
    {
        $product->category_id = auth()->check() ? auth()->user()->category_id :$request->category_id;
        $product->matiere_id = auth()->check() ? auth()->user()->matiere_id :$request->matiere_id;
        $product->maternel_id = auth()->check() ? auth()->user()->maternel_id :$request->maternel_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->sub_title = $request->sub_title;
        $product->body = $request->body;
        $product->second_title = $request->second_title;
        $product->excerpt = $request->excerpt;
        $product->third_title = $request->third_title;
        $product->main = $request->main;
        $product->date_product = $request->date_product;
        $product->video = $request->video;
        $product->image('image', $product);
        $product->photo('photo', $product);
        $product->media('media', $product);
        $product->upload('upload', $product);
        $product->fichier('fichier', $product);
        $product->user_id = Auth::user()->id;
        $product->save();

        return redirect()->route('site.profil.enseignant.index')->withSecondary('Votre cours est modifié avec succès!');
    }

    public function deletedestroy(Product $product)
    {
        
        $product->delete();

        return redirect()->route('site.profil.enseignant.index')->withDanger('Votre cours est supprimé avec succès!');
    }
}
