@extends('admin.admin')

@section('content')

    <h2>{{ $product->title }}</h2>
    <p>{{ $product->description }}</p>
    <img src="{{ asset('image/images/' .$product->image) }}" alt="" height="400">
    <h2>{{ $product->sub_title }}</h2>
    <p>{{ $product->body }}</p>
    <img src="{{ asset('image/photos/' .$product->photo) }}" alt="" height="400">
    <h2>{{ $product->second_title }}</h2>
    <p>{{ $product->excerpt }}</p>
    <img src="{{ asset('image/medias/' .$product->media) }}" alt="" height="400">
    <h2>{{ $product->third_title }}</h2>
    <p>{{ $product->main }}</p>
    <img src="{{ asset('image/uploads/' .$product->upload) }}" alt="" height="400">
    <p><a href="{{ route('site.profil.enseignant.index') }}">Go Back</a></p>
</div>

@forelse ($product->images as $image)
<div class="card mt-3 mb-3">
  <div class="row no-gutters">
    <div class="col-md-12 col-sm-12 col-12">
         <h5  class="mb-3" style="color:red;"> Fichier de </h5>
          <p class="comments_paragraph"> <span class="comments_paragraph_user">@if($image->user->image)
             <img src="{{ asset('image/users/' .$image->user->image) }}" style="border-radius:50%;" alt="" width="70" height="70">
                @else
                  <img src="/image/users/default.png" alt="" style="border-radius:50%;" width="70" height="70" />
                @endif
                <p><a href="{{ url('image/students/' .$image->image) }}"><img src="{{ asset('images/pdf.jpg') }}" alt="" width="30" height="30">Telecharger votre fichier</a></p>
                &nbsp&nbspDevoir de&nbsp</span> |&nbsp <span class="btn btn-primary">{{ $image->user->first_name }} {{ $image->user->category->category_name }} {{ $image->user->maternel->maternel_name }} N° Identification unique: {{ $image->user->numberunique }}</span></p>
              
    </div>
  </div>

  @empty
    <p class="paragraph_title title_responsive" style="color:#fff;">Cette annonce n'a aucun commentaire.</p>

 @endforelse
@endsection