<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Maternel;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class MaternelController extends Controller
{
    public function index()
    {
        return view('site.maternelle.index');
    }

    public function profilEnseignantMaternelle()
    {
        $users  = Category::find(1)
        ->users()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.maternelle.profil', compact('users'));
    }


    public function petiteSection()
    {
        $products  = Maternel::find(1)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(1);
        
        return view('site.maternelle.classe.petitesection', compact('products'));
    }

    public function MoyenneSection()
    {
        $products  = Maternel::find(2)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(1);
        
        return view('site.maternelle.classe.moyennesection', compact('products'));
    }

    public function grandeSection()
    {
        $products  = Maternel::find(3)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(1);
        
        return view('site.maternelle.classe.grandesection', compact('products'));
    }
    //
}



