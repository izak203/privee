<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PremiumsController extends Controller
{
    public function index()
    {
        $users = User::with('identite', 'category')->where('identite_id', 2)->orderBy('id', 'DESC')->paginate(5);

        return view('admin.premiums.index', 
                   ['users' => $users]
          );
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('admin.premiums.show', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        User::whereId($id)->update([
            'premiums' => request()->has('premiums')
        ]);

        return back()->withSuccess('Votre profil est validé!');
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

        return back()->withDanger("Votre profil n'est pas accepté, il est supprimé!");
    }

    //
}
