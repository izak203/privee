@extends('admin.admin')

@section('content')
<div class="container mt-4">
  @include('info.notification')
     <div class="row">

       @foreach($products as $product)

          <div class="col-md-12">
            <form method="post" action="{{ route('admin.premium.update', $product->id) }}">
                @csrf
                 @method('PATCH')
                 <label for="premium" class="checkbox">
                  <h4 style="color: blue;">Category: <a href="{{ route('admin.premium.show', $product->id) }}">{{ $product->category->category_name }} - {{ $product->maternel->maternel_name }}</a></h4>
                  <h4 style="color: blue;">User: {{ $product->user->email }}</h4>
                 <h4 style="color: tomato;"><input type="checkbox" name="premium" onChange="this.form.submit()"> {{ $product->title }}</a></h4>

                </label>
                <p><img src="{{ asset('image/images/'.$product->image )}}" width="100" height="100" alt="" /></p>
                  <p>{{ Str::limit( $product->description, 100) }}</p>
                <p class="date_publication">Le cours est publié, {{ $product->created_at->diffForHumans() }}</p>
                 
              </form><br>
         <form method="post" action="{{ route('admin.premium.destroy', $product->id) }}">
         @method('DELETE')
        @csrf
        <div>
          <button type="submit" class="btn btn-danger"><svg class="bi bi-trash-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></button>
        </div>

              </form>
            </div>
      
    @endforeach

  </div>
  
  <div class="container">
  <p>{{ $products->links() }}</p>
  </div>   
@endsection