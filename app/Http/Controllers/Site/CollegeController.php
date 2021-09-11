<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Maternel;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{
    public function index()
    {
        return view('site.college.index');
    }

    public function profilEnseignantCollege()
    {
        $users  = Category::find(3)
        ->users()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.college.profil', compact('users'));
    }

    public function sixieme()
    {
        $products  = Maternel::find(9)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.college.classe.sixieme', compact('products'));
    }

    public function cinqieme()
    {
        $products  = Maternel::find(10)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.college.classe.cinqieme', compact('products'));
    }

    public function quatrieme()
    {
        $products  = Maternel::find(11)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.college.classe.quatrieme', compact('products'));
    }

    public function troisieme()
    {
        $products  = Maternel::find(12)
        ->products()->where('premium', 1)
        ->orderBy('id', 'DESC')->paginate(12);

        return view('site.college.classe.troisieme', compact('products'));
    }
    //
}
