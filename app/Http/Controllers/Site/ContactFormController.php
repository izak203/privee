<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class ContactFormController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Coordonne()
    {
         return view('site.contacts.coordonne');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = request()->validate([
        'name' =>   'required|min:5|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|min:5|max:1000'
        ]);

             Mail::to('saidd6988@gmail.com')->send(new ContactFormMail($data));
       return redirect()->route('site.ecoleprivenumeric.index')->with('success', 'Votre message est reçu avec succès!');

    }
   
    //
}
