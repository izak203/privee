@extends('admin.admin')

@section('styles')
<style>
    .file {
        visibility: hidden;
        position: absolute;
        }
</style>

@endsection

@section('content')
    @include('info.notification')
        <h1>Ajouter votre cours</h1>
        <form action="{{ route('site.profil.maternel.addstore') }}" id="image-form" method="POST" enctype="multipart/form-data">
          @csrf 
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
                        <input type="date" name="date_product" class="form-control py-4" id="date_product"  value="{{ old('date_product') }}">
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
                        <input type="text" name="title" class="form-control py-4" id="title" placeholder="Ajouter un Titre" value="{{ old('title') }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description" class="mb-1">Description: </label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10"  placeholder="Ajouter votre description">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Image</label><br>
                        <input type="file" name="image" class="btn btn-info btn-block" value="{{ old('image') }}">
                    </div>  
                </div>  
           </div> 
           <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sub_title" class="mb-1">Second Titre: </label>
                        <input type="text" name="sub_title" class="form-control py-4" id="sub_title" placeholder="Ajouter un seond titre" value="{{ old('sub_title') }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="body" class="mb-1">Second Description: </label>
                        <textarea name="body" id="body" class="form-control" cols="30" rows="10"  placeholder="Ajouter votre seconde description">{{ old('body') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="photo">Photo</label><br>
                        <input type="file" name="photo" class="btn btn-info btn-block" value="{{ old('photo') }}">
                    </div>  
                </div>  
           </div> 

           <!-- PRIV2E -->
           <div class="col-md-3 form-input">
                    <label for="file-ip-3">UPLOAD</label>
                    <input type="file" name="photo" id="file-ip-3" accept="image/*" onchange="showPreviewww(event);">
                <div class="preview">
                    <img id="file-ip-3-preview">
                </div>
                </div>

                <!-- -->
            
           <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="second_title" class="mb-1">Troisième Titre: </label>
                        <input type="text" name="second_title" class="form-control py-4" id="second_title" placeholder="Ajouter un troisième titre" value="{{ old('second_title') }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="excerpt" class="mb-1">Troisième Description: </label>
                        <textarea name="excerpt" id="excerpt" class="form-control" cols="30" rows="10"  placeholder="Ajouter votre troisième description">{{ old('excerpt') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="media">media</label><br>
                        <input type="file" name="media" class="btn btn-info btn-block" value="{{ old('media') }}">
                    </div>  
                </div>  
           </div> 

            <!-- PRIV2E -->
            <div class="col-md-3 form-input">
                    <label for="file-ip-2">UPLOAD</label>
                    <input type="file" name="media" id="file-ip-2" accept="image/*" onchange="showPrevieww(event);">
                <div class="preview">
                    <img id="file-ip-2-preview">
                </div>
                </div>

                <!-- -->
      
           <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="third_title" class="mb-1">Quatrième Titre: </label>
                        <input type="text" name="third_title" class="form-control py-4" id="third_title" placeholder="Ajouter un quatrième titre" value="{{ old('third_title') }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="main" class="mb-1">Quatrième Description: </label>
                        <textarea name="main" id="main" class="form-control" cols="30" rows="10"  placeholder="Ajouter votre quatrième description">{{ old('main') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="upload">upload</label><br>
                        <input type="file" name="upload" class="btn btn-info btn-block" value="{{ old('upload') }}">
                    </div>  
                </div> 

                <!-- PRIV2E -->
                <div class="col-md-3 form-input">
                    <label for="file-ip-1">UPLOAD</label>
                    <input type="file" name="upload" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                <div class="preview">
                    <img id="file-ip-1-preview">
                </div>
                </div>

                <!-- -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fichier">Cours, exercice, devoirs en PDF obligatoire</label><br>
                        <input type="file" name="fichier" class="btn btn-info btn-block" value="{{ old('fichier') }}">
                    </div>  
                </div>  
           </div> 
           <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="video">Cours en mode vidéo obligatoire</label><br>
                        <input type="text" name="video" placeholder="https://www;youtube.com/vodo" class="btn btn-info btn-block" value="{{ old('video') }}" required>
                    </div>  
                </div> 
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-primary">Ajouter un cours</button>
            </div>
        </form>
    
@endsection

@section('js')

<script>
    function showPreview(event){
        if (event.target.files.length > 0) {
           var src = URL.createObjectURL(event.target.files[0]);
           var preview = document.getElementById("file-ip-1-preview");
           preview.src = src;
           preview.style.display = "block";
        }
    }

    function showPrevieww(event){
        if (event.target.files.length > 0) {
           var src = URL.createObjectURL(event.target.files[0]);
           var preview = document.getElementById("file-ip-2-preview");
           preview.src = src;
           preview.style.display = "block";
        }
    }

    function showPreviewww(event){
        if (event.target.files.length > 0) {
           var src = URL.createObjectURL(event.target.files[0]);
           var preview = document.getElementById("file-ip-3-preview");
           preview.src = src;
           preview.style.display = "block";
        }
    }
</script>
@endsection


<!--<div class="col-md-3 form-input">
    <label for="file-ip-1">UPLOAD</label>
     <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
<div class="preview">
    <img id="file-ip-1-preview">
</div>
</div>

<script>
    function showPreview(event){
        if (event.target.files.length > 0) {
           var src = URL.createObjectURL(event.target.files[0]);
           var preview = document.getElementById("file-ip-1-preview");
           preview.src = src;
           preview.style.display = "block";
        }
    }
</script> --> 