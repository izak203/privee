<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
//use willvincent\Rateable\Rateable;

class CommentsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
 
 
    public function store(CommentRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
 
        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);
        return redirect()->route('site.lycee.terminalelshow', [$product->id, $product->slug])->with('success', 'Votre commentaire est ajouté avec succès!');
    }

    /*public function postPost(Request $request)
        {
        request()->validate(['rate' => 'required']);
        $post = Post::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $post->ratings()->save($rating);

        return redirect()->route('site.posts.show', [$post->id, $post->slug])->with('success', 'votre commentaire est ajouté avec succès!');
        }*/
}

