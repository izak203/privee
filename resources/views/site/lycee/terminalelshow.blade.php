@extends('layouts_ecole.app')
@include('info.notification')
@section('content')
<div class="container mt-4">
   <h2 class="mb-4 title_primaire_ecole">Lycée classe de {{ $product->maternel->maternel_name }}</h2>
   <!--<h1><a href="{{ route('site.lycee.index') }}">{{ $product->title }}</a></h1>
   <P style="text-align:center;">{!! $product->video_html !!}</P>
   <p><img src="{{ asset('image/users/' .$product->user->image) }}" alt="" width="50" height="50"> {{ $product->user->first_name }} - {{ $product->user->last_name }}</p>
   <h4><span class="profil">Enseignant(es): {{ $product->matiere->matiere_name }} </span> {{ $product->category->category_name }} {{ $product->maternel->maternel_name }} </h4>
   <p style="text-align:center;"><iframe src="{{ url('image/images/' .$product->image) }}" frameborder="0" width="60%" height="360"></iframe></p>--> 

<h6 class="comments_title"> Envoyer votre devoir <span class="comments_paragraph">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}.</span></h6>
<form method="post" action="{{ route('site.profil.etudiant.image.postfile') }}" enctype="multipart/form-data">
@csrf

<div class="form-row">
       <div class="col-md-6">
           <div class="form-group">
           <h2><label for="first_name" class="mb-1">Nom</label></h2>
               <input type="text" name="first_name" class="form-control py-4" value="{{ Auth::user()->first_name }}" disabled>
            </div>
       </div>
       <div class="col-md-6">
           <div class="form-group">
           <h2><label for="last_name" class="mb-1">Prenom</label></h2>
               <input type="text" name="last_name" class="form-control py-4" value="{{ Auth::user()->last_name }}" disabled>
            </div>
       </div>
   </div>
   <div class="form-row">
        <div class="col-md-6">
           <div class="form-group">
           <h2><label for="email" class="mb-1">Email</label></h2>
               <input type="text" name="email" class="form-control py-4" value="{{ Auth::user()->email }}" disabled>
            </div>
       </div>
        <div class="col-md-6">
            <div class="form-group">
                <h2><label for="image">Envoyer votre fichier</label><br></h2>
               <input type="file" name="image" class="form-control btn btn-info">
               <input  name="product_id"  type="hidden" value="{{ $product->id }}"/>
            </div>  
       </div>  
    </div> 

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Envoyer votre fichier</button>
        </div>
     
</form>
</div>

<div class="container">
@if (Auth::check())
<h6 class="comments_title"> Commentez le cours du prof {{ $product->user->first_name }} <span class="comments_paragraph">@if($product->user) {{ $product->user->first_name }} @else {{ $product->first_name }} @endif.</span></h6>
<form method="post" action="{{ route('comments.store') }}" enctype="multipart/form-data">
@csrf
      <div class="form-row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <h5 class="titre_cinq"><label class="small mb-1" for="body">Commentaire:<label></h5>
                    <textarea name="body" placeholder="Ajouter un commentaire" class="form-control" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
                    <input  name="product_id"  type="hidden" value="{{ $product->id }}"/>
                </div>
            </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ajouter votre Commentaire</button>
        </div>
</form>
@endif

@forelse ($product->comments as $comment)
<div class="card mt-3 mb-3">
  <div class="row no-gutters">
    <div class="col-md-12 col-sm-12 col-12">
         <h5  class="mb-3" style="color:red;"> Commentaire</h5>
          <p class="comments_paragraph"> <span class="comments_paragraph_user">@if($comment->user->image)
             <img src="{{ asset('image/users/' .$comment->user->image) }}" style="border-radius:50%;" alt="" width="70" height="70">
                @else
                  <img src="/image/users/default.png" alt="" style="border-radius:50%;" width="70" height="70" />
                @endif
                &nbsp&nbspCommentaire de&nbsp</span> |&nbsp {{ $comment->user->first_name }}</p>
              <p class="paragraph_title title_responsive">{{ $comment->body }}</p>
    </div>
  </div>
</div>
  @empty
    <p class="paragraph_title title_responsive" style="color:#fff;">Cette annonce n'a aucun commentaire.</p>

 @endforelse
 
@endsection