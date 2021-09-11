<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Maternel;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class LyceeController extends Controller
{
    public function index()
    {
        return view('site.lycee.index');
    }

    public function profilEnseignantLycee()
    {
        $users  = Category::find(4)
        ->users()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
        return view('site.lycee.profil', compact('users'));
    }

    public function seconde()
    {
        $products  = Maternel::find(13)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.lycee.classe.seconde', compact('products'));
    }

    public function premiere()
    {
        $products  = Maternel::find(14)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.lycee.classe.premiere', compact('products'));
    }

    public function terminale()
    {
        $products  = Maternel::find(15)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.lycee.classe.terminale', compact('products'));
    }

    public function terminaleshow(Product $product)
    {

       return view('site.lycee.terminalelshow', compact('product'));
    }
    //
}
