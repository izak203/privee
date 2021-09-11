<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Maternel;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class PrimaireController extends Controller
{
    public function index()
    {
        return view('site.primaire.index');
    }

    public function profilEnseignantPrimaire()
    {
        $users  = Category::find(2)
        ->users()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.primaire.profil', compact('users'));
    }

    public function cepe()
    {
        $products  = Maternel::find(4)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.primaire.classe.cepe', compact('products'));
    }

    public function ceun()
    {
        $products  = Maternel::find(5)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.primaire.classe.ceun', compact('products'));
    }


    public function cedeux()
    {
        $products  = Maternel::find(6)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.primaire.classe.cedeux', compact('products'));
    }

    public function cemun()
    {
        $products  = Maternel::find(7)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.primaire.classe.cemun', compact('products'));
    }


    public function cemdeux()
    {
        $products  = Maternel::find(8)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.primaire.classe.cemdeux', compact('products'));
    }
   //
}
