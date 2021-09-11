@extends('admin.admin')

@section('content')
   
        <h1>Ajouter votre cours</h1>
        <form action="{{ route('site.profil.maternel.editupdate', $product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf 
          @method('PATCH')
          
          <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id" class="mb-1">Category: </label>
                        <input type="text" name="category_id" class="form-control py-4" id="category_id"  value="{{ Auth::user()->category->category_name }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_product" class="mb-1">Date de production: </label>
                        <input type="date" name="date_product" class="form-control py-4" id="date_product"  value="{{ $product->date_product }}">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="maternel_id" class="mb-1">Classe: </label>
                        <input type="text" name="maternel_id" class="form-control py-4" id="maternel_id"  value="{{ Auth::user()->maternel->maternel_name }}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="matiere_id" class="mb-1">Programme: </label>
                        <input type="text" name="matiere_id" class="form-control py-4" id="matiere_id"  value="{{ Auth::user()->matiere->matiere_name }}" disabled>
                    </div>
                </div>
            </div>
           
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="mb-1">Titre: </label>
                        <input type="text" name="title" class="form-control py-4" id="title" value="{{ $product->title }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description" class="mb-1">Description: </label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Image</label><br>
                        <iframe src="{{ url('image/images//' .$product->image) }}" width="100" height="100"></iframe>
                        <input type="file" name="image" class="btn btn-info" value="{{ $product->image }}">
                    </div>  
                </div>  
           </div> 
           <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sub_title" class="mb-1">Second Titre: </label>
                        <input type="text" name="sub_title" class="form-control py-4" id="sub_title"  value="{{ $product->sub_title }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="body" class="mb-1">Second Description: </label>
                        <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ $product->body }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo">Photo</label><br>
                        <img src="{{ asset('/image/photos/' .$product->photo) }}" alt="" width="100" height="100">
                        <input type="file" name="photo" class="btn btn-info" value="{{ $product->photo }}">
                    </div>  
                </div>  
           </div> 
           <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="second_title" class="mb-1">Troisième Titre: </label>
                        <input type="text" name="second_title" class="form-control py-4" id="second_title"  value="{{ $product->second_title }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="excerpt" class="mb-1">Troisième Description: </label>
                        <textarea name="excerpt" id="excerpt" class="form-control" cols="30" rows="10">{{ $product->excerpt }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="media">media</label><br>
                        <iframe src="{{ url('image/medias/' .$product->media) }}" width="100" height="100"></iframe>
                        <input type="file" name="media" class="btn btn-info" value="{{ $product->media }}">
                    </div>  
                </div>  
           </div> 
           <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="third_title" class="mb-1">Quatrième Titre: </label>
                        <input type="text" name="third_title" class="form-control py-4" id="third_title"  value="{{ $product->third_title }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="main" class="mb-1">Quatrième Description: </label>
                        <textarea name="main" id="main" class="form-control" cols="30" rows="10">{{ $product->main }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="upload">upload</label><br>
                        <img src="{{ asset('/image/uploads/' .$product->upload) }}" alt="" width="100" height="100">
                        <input type="file" name="upload" class="btn btn-info" value="{{ $product->upload }}">
                    </div>  
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fichier">Cours en PDF obligatoire</label><br>
                        <iframe src="{{ url('image/fichiers/' .$product->fichier) }}" width="100" height="100"></iframe>
                        <input type="file" name="fichier" class="btn btn-info" value="{{ $product->fichier }}">
                    </div>  
                </div>  
           </div> 
           <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="video">Vidéo</label><br>
                        <input type="text" name="video"  class="btn btn-info" value="{{ $product->video }}">
                    </div>  
                </div> 
           </div>
            <div class="form-row">
                <button type="submit" class="btn btn-secondary">Modifier un cours</button>
            </div>
        </form>
    
@endsection

