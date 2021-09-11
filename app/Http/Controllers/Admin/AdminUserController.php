<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Moyenne;
use App\Models\Bulletin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('users')->where('identite_id', 1)->orderBy('id', 'DESC')->paginate(5);
        $users = User::with('payment', 'identite')->where('identite_id', 1)->orderBy('id', 'DESC')->paginate(5);

        return view('admin.users.etudiant.index', 
                   ['users' => $users]
          );
        //
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validerBulletin(User $user)
    {

    return view('admin.users.etudiant.validerbulletin', compact('user'));
        //
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validerBulletinUpdate(Request $request, User $user)
    {
        $user->bulletin_id = $request->bulletin_id;
        $user->valider_bulletin = $request->valider_bulletin;
        $user->update();

        return redirect()->route('admin.users.etudiant.index')->withSecondary('Votre profil est modifié avec succès');
        
        //
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enseignant()
    {

        //$users = User::with('payment')->orderBy('id', 'DESC')->paginate(3);
        $users = DB::table('users')->where('identite_id', 2)->orderBy('id', 'DESC')->paginate(5);

        return view('admin.users.enseignant.enseignant', 
                   ['users' => $users]
          );
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enseignantEdit(User $user)
    {
        $categories = Category::all();

        return view('admin.users.enseignant.enseignantedit', compact('user', 'categories'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enseignantUpdate(Request $request, User $user)
    {
        
        $user->category_id = $request->category_id;
        $user->role_id = $request->role_id;
        $user->valider_bulletin = $request->valider_bulletin;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->tel = $request->tel;
        $user->diploma = $request->diploma;
        $user->experience = $request->experience;
        $user->image('image', $user);
        $user->save();

        return redirect()->route('admin.users.enseignant.enseignant')->withSecondary('Votre profil est modifié avec succès');
        
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

        return redirect()->route('admin.users.etudiant.index')->withDanger('Votre profil est supprimé');
        //
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyenseignant(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.enseignant.enseignant')->withDanger('Votre profil est supprimé');
        //
    }
}
