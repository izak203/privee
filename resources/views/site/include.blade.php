@foreach($products as $product)
      <div class="col-md-3">
      <h6 style="margin-top:20px;">{{ $product->user->first_name }} <span class="btn btn-sm btn-primary"> N° {{ $product->user->numberunique }}</span></h6>
     
      @if($product->user->image)
        <p style="margin-top:20px;"><img src="{{ asset('image/users/' .$product->user->image) }}" class="mb-3 " alt="" width="100%" height="360"></p>
      @else
         <p ><img src="/images/users/default.png" alt="" width="100%" class="mb-4" height="400"/>
      @endif</p>
      
      </div>
      <div class="col-md-9">
      <h4 style="margin-top:20px;"><a href="{{ route('site.lycee.terminalelshow', [$product->id, $product->slug]) }}" target="_blank">{{ $product->title }}</a></h4>
      <p style="text-align:left;margin-top:20px;"><iframe src="{{ url('image/images/' .$product->image) }}" frameborder="0" width="100%" height="360"></iframe></p>
      </div>
      <div class="col-md-12">
         <p>{{ $product->description }}</p>
      </div>

      <div class="col-md-12">
         <h2 style="color:red;">{{ $product->sub_title }}</h2>
         <img src="{{ asset('image/photos/' .$product->photo) }}" alt="" width="100%" height="400">
         <p>{{ $product->body }}</p>
      </div>

      <div class="col-md-12">
         <h2 style="color:red;">{{ $product->second_title }}</h2>
         <img src="{{ asset('image/medias/' .$product->media) }}" alt="" width="100%" height="400">
         <p>{{ $product->excerpt }}</p>
      </div>

      <div class="col-md-12">
         <h2 style="color:red;">{{ $product->third_title }}</h2>
         <img src="{{ asset('image/uploads/' .$product->upload) }}" alt="" width="100%" height="400">
         <p>{{ $product->main }}</p>
      </div>
      @if($product->fichier)
      <p><a href="{{ url('image/fichiers/' .$product->fichier) }}"><img src="{{ asset('images/pdf.jpg') }}" alt="" width="30" height="30"> Telecharger votre fichier</a></p>
     @endif
   
   @endforeach