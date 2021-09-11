<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Maternel;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ModuleNumericController extends Controller
{
    public function index()
    {
        return view('site.numeric.index');
    }

    public function profilEnseignantNumeric()
    {
        $users  = Category::find(5)
        ->users()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
        return view('site.numeric.profil', compact('users'));
    }

    public function htmlcssbootstrap()
    {
        $products  = Maternel::find(16)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.numeric.classe.htmlcssbootstrap', compact('products'));
    }

    public function javascript()
    {
        $products  = Maternel::find(17)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.numeric.classe.javascript', compact('products'));
    }

    public function phpMysql()
    {
        $products  = Maternel::find(18)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.numeric.classe.phpmysql', compact('products'));
    }
    
    public function poo()
    {
        $products  = Maternel::find(19)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.numeric.classe.poo', compact('products'));
    }

    public function laravelsymfony()
    {
        $products  = Maternel::find(20)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.numeric.classe.laravelsymfony', compact('products'));
    }

    public function wordpressdjoomla()
    {
        $products  = Maternel::find(21)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.numeric.classe.wordpressdjoomla', compact('products'));
    }
    //
}
