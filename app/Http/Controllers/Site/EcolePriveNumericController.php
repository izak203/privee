<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EcolePriveNumericController extends Controller
{
    public function index()
    {
        return view('site.ecoleprivenumeric.index');
    }

    public function file()
    {
        return view('site.ecoleprivenumeric.file');
    }
    //
}
