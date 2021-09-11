<?php

namespace App\Http\Controllers\Profil;

use App\Models\User;
use App\Models\Quiz;
use App\Models\Image;
use App\Models\Category;
use App\Models\Identite;
use App\Models\Maternel;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postfiles(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        
        $image = new Image();
        $image->user_id = Auth::user()->id;
        $image->first_name = auth()->check() ? auth()->user()->first_name :$request->first_name;
        $image->email = auth()->check() ? auth()->user()->email : $request->email;
        $image->last_name = auth()->check() ? auth()->user()->last_name :$request->last_name;
        $image->product_id = $product->id;
        $image->image('image', $image);
        $image->save();

        return redirect()->route('site.lycee.terminalelshow', [$product->id, $product->slug])->with('success', 'Votre votre dossier est envoyé à votre maitre avec succès!');

    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postfilesQuiz(Request $request)
    {
        $quiz = Quiz::findOrFail($request->quiz_id);
        
        $image = new Image();
        $image->user_id = Auth::user()->id;
        $image->first_name = auth()->check() ? auth()->user()->first_name :$request->first_name;
        $image->email = auth()->check() ? auth()->user()->email : $request->email;
        $image->last_name = auth()->check() ? auth()->user()->last_name :$request->last_name;
        $image->quiz_id = $quiz->id;
        $image->image('image', $image);
        $image->save();

        return redirect()->route('home.result', $quiz->id)->with('success', 'Votre Quiz est envoyé à votre maitre avec succès!');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
