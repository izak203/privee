<?php

namespace App\Http\Controllers\Profil;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\User;
use App\Models\Moyenne;
use App\Models\Bulletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class TeacherBulletinMaternelleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveMaternelUn()
    {
        //il s'agit d'un test pour selectionner 
        $users = User::where('category_id', 1)
               ->where('maternel_id', 1)
               ->where('role_id', 3)
               ->orderBy('id','DESC')
               ->paginate(12);
       
        return view('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematernelun', [
            'users' => $users
            
        ]);
        
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveMaternelDeux()
    {

        $users = User::where('category_id', 1)->where('maternel_id', 2)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);
       
        return view('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematerneldeux', [
            'users' => $users
            
        ]);
        
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveMaternelTrois()
    {

        $users = User::where('category_id', 1)->where('maternel_id', 3)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);
       
        return view('site.profil.bulletin.maternelle.selectelevematernelle.selectelevematerneltrois', [
            'users' => $users
            
        ]);
        
        //
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectElevePrimaireCp()
    {
        $users = User::where('category_id', 2)->where('maternel_id', 4)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecp', [
            'users' => $users 
        ]);
        
        //
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectElevePrimaireCeun()
    {
        $users = User::where('category_id', 2)->where('maternel_id', 5)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimaireceun', [
            'users' => $users 
        ]);
        
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectElevePrimaireCedeux()
    {
        $users = User::where('category_id', 2)->where('maternel_id', 6)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecedeux', [
            'users' => $users 
        ]);
        
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectElevePrimaireCemun()
    {
        $users = User::where('category_id', 2)->where('maternel_id', 7)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecemun', [
            'users' => $users 
        ]);
        
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectElevePrimaireCemdeux()
    {
        $users = User::where('category_id', 2)->where('maternel_id', 8)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selecteleveprimaire.selecteleveprimairecemdeux', [
            'users' => $users 
        ]);
        
        //
    }



     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveColegeSixieme()
    {
        $users = User::where('category_id', 3)->where('maternel_id', 9)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegesixieme', [
            'users' => $users 
        ]);
        
        //
    }

    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveColegeCinqieme()
    {
        $users = User::where('category_id', 3)->where('maternel_id', 10)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegecinqieme', [
            'users' => $users 
        ]);
        
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveColegeQuatrieme()
    {
        $users = User::where('category_id', 3)->where('maternel_id', 11)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegequatrieme', [
            'users' => $users 
        ]);
        
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveColegeTroisieme()
    {
        $users = User::where('category_id', 3)->where('maternel_id', 12)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevecollege.selectelevecollegetroisieme', [
            'users' => $users 
        ]);
        
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveLyceeSeconde()
    {
        $users = User::where('category_id', 4)->where('maternel_id', 13)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceeseconde', [
            'users' => $users 
        ]);
        
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveLyceePremiere()
    {
        $users = User::where('category_id', 4)->where('maternel_id', 14)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceepremiere', [
            'users' => $users 
        ]);
        
        //
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveLyceeTerminale()
    {
        $users = User::where('category_id', 4)->where('maternel_id', 15)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevelycee.selectelevelyceeterminale', [
            'users' => $users 
        ]);
        
        //
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveNumeriqueHtmlCssBootstrap()
    {
        $users = User::where('category_id', 5)->where('maternel_id', 16)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquehtmlcssbootstrap', [
            'users' => $users 
        ]);
        
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveNumeriqueJavascript()
    {
        $users = User::where('category_id', 5)->where('maternel_id', 17)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquejavascript', [
            'users' => $users 
        ]);
        
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveNumeriquePhpMysql()
    {
        $users = User::where('category_id', 5)->where('maternel_id', 18)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquephpmysql', [
            'users' => $users 
        ]);
        
        //
    }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveNumeriquePoo()
    {
        $users = User::where('category_id', 5)->where('maternel_id', 19)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquepoo', [
            'users' => $users 
        ]);
        
        //
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveNumeriqueLaravelSymfony()
    {
        $users = User::where('category_id', 5)->where('maternel_id', 20)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquelaravelsymfony', [
            'users' => $users 
        ]);
        
        //
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectEleveNumeriqueWordpressdDjoomla()
    {
        $users = User::where('category_id', 5)->where('maternel_id', 21)->where('role_id', 3)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.bulletin.maternelle.selectelevenumerique.selectelevenumeriquewordpressdjoomla', [
            'users' => $users 
        ]);
        
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $bulletins = Bulletin::all();

    return view('site.profil.bulletin.maternelle.create', compact('types', 'bulletins'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $moyenne = new Moyenne();
        $moyenne->user_id = $user->id;
        $moyenne->bulletin_id = $request->bulletin_id;
        $moyenne->type_id = $request->type_id;
        $moyenne->title   = $request->title;
        $moyenne->francais   = $request->francais;
        $moyenne->suggestion   = $request->suggestion;
        $moyenne->coefficiant = $request->coefficiant;
        $moyenne->total = $request->total;
        $moyenne->save();

        return redirect()->route('site.profil.bulletin.maternelle.showbulletinuser', [$user->id])->withSuccess('Note ajouté');;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbulletinuser(User $user)
    {
        $types = Type::all();
        $bulletins = Bulletin::all();

        return view('site.profil.bulletin.maternelle.showbulletinuser', compact('user', 'types', 'bulletins'));
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
