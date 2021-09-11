<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Profil Enseignant</title>
        <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('styles/main.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- module privé-->
       <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">--> 
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>--> 
      
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>--> 
        <!-- fin du module privé-->
        <style> 
        .file {
            visibility: hidden;
            position: absolute;
            }
        </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                @include('info.notification')
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Creér votre compte Enseignant</h3></div>
                                    <div class="card-body">
<form action="{{ route('site.profil.enseignant.store') }}" method="POST" enctype="multipart/form-data">
@csrf 
<div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
            <label class="small ecole" for="matiere_id">Choisir l'école*</label>
                <select name="category_id" id="category_id" class="form-control productcategory">
                    <option value="0" disabled="true" selected="true">Choisir l'école</option>
                        @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->category_name }}</option>
                        @endforeach
                </select>
           
                <label class="small ecole" for="matiere_id">Choisir la classe* </label>
                <select name="maternel_id" class="form-control maternel_name">
                    <option value="0" disabled="true" selected="true">Choisir la classe</option>
                </select>
            </div>
        </div>
  
        <div class="col-md-6">
            <div class="form-group">
                <label class="small ecole" for="identite_id">Identité* </label>
                <select name="identite_id" id="identite_id" class="form-control">
                    @foreach($identites as $identite)
                    <option value="{{ $identite->id }}">{{ $identite->identite_name }}</option>
                    @endforeach
                </select>
                <label class="small ecole" for="matiere_id">Matière* </label>
                <select name="matiere_id" id="matiere_id" class="form-control">
                    @foreach($matieres as $matiere)
                    <option value="{{ $matiere->id }}">{{ $matiere->matiere_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

          
<!--<label class="small mb-1 productcategory" for="category_id">Catégories </label> 
    <select name="category_id" id="category_id" class="form-control">
     @foreach($categories as $category)
       <option value="{{ $category->id }}">{{ $category->category_name }}</option>
     @endforeach
    </select>-->
</center>

    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="first_name" class="mb-1 ecole">Nom*: </label>
                <input type="text" name="first_name" class="form-control py-4" id="first_name" placeholder="Ajouter un nom" value="{{ old('first_name') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_name" class="mb-1 ecole">Prénom*: </label>
                <input type="text" name="last_name" class="form-control py-4"  id="last_name" placeholder="Ajouter un prénom" value="{{ old('last_name') }}" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="city" class="mb-1 ecole">Ville*: </label>
                <input type="text" name="city" class="form-control py-4" id="city" placeholder="Ajouter une ville" value="{{ old('city') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address" class="mb-1 ecole">Adresse*: </label>
                <input type="text" name="address" class="form-control py-4"  id="address" placeholder="Ajouter une adresse" value="{{ old('address') }}" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="postalcode" class="mb-1 ecole">Code postale*: </label>
                <input type="text" name="postalcode" class="form-control py-4"  id="postalcode" placeholder=" Ajouter un postalcode" value="{{ old('postalcode') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="birth" class="mb-1 ecole">Date de naissance*: </label>
                <input type="date" name="birth" class="form-control py-4"  id="birth" placeholder=" Ajouter un date de naissance" value="{{ old('birth') }}" required>
            </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="diploma" class="mb-1 ecole">Diplôme*: </label>
                <input type="text" name="diploma" class="form-control py-4"  id="diploma" placeholder="Ajouter un diplôme" value="{{ old('diploma') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tel" class="mb-1 ecole">Téléphone*: </label>
                <input type="text" name="tel" class="form-control py-4"  id="tel" placeholder="Ajouter un tél" value="{{ old('tel') }}" required>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country" class="mb-1 ecole">Pays*: </label>
                <input type="text" name="country" class="form-control py-4" id="country" placeholder="Ajouter un pays" value="{{ old('country') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="mb-1 ecole">E-mail*: </label>
                <input type="email" name="email" class="form-control py-4"  id="email" placeholder="Ajouter un E-mail" value="{{ old('email') }}" required>
            </div>
        </div>
    </div>
    <div class="form-row">
       <div class="col-md-6">
           <div class="form-group">
               <label for="password" class="mb-1 ecole">Mot de passe*:</label>
               <input type="password" name="password" class="form-control py-4" placeholder="Ajouter un nom" value="{{ old('password') }}" required autocomplete="new-password">
            </div>
       </div>
       <div class="col-md-6">
           <div class="form-group">
               <label for="password-confirm" class="mb-1 ecole">Confirmer le mot de passe*:</label>
               <input type="password" name="password_confirmation" class="form-control py-4" placeholder="Ajouter un prenom" value="{{ old('password_confirmation') }}" required autocomplete="new-password">
            </div>
       </div>
   </div>

    <div class="form-row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="experience" class="mb-1 ecole">Expérience*: </label>
                <textarea name="experience" id="experience" class="form-control" cols="30" rows="10"  placeholder="Ajouter votre expérience en quelques lignes" required>{{ old('experience') }}</textarea>
            </div>
        </div>
    </div>
    <!--<div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">Photo</label><br>
                <input type="file" name="image" class="btn btn-info" value="{{ old('image') }}">
            </div>  
       </div>  
    </div>--> 
     <!-- upload image bootstrap preview --> 
     <div class="form-row">   
          <div class="ml-2 col-sm-3">
                <div id="msg"></div>
               
                    <input type="file" name="image" class="file" accept="image/*" value="{{ old('image') }}">
                    <div class="input-group my-3">
                    <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                    <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary">Télécharger...</button>
                    </div>
                    </div>
                
                </div>
                <div class="ml-2 col-sm-3">
                <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
              </div>
        </div>
            <!-- -->

    <div class="form-row">
        <button type="submit" class="btn btn-primary mb-4">Créer votre compte</button>
    </div>
</form>

</div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/js/scripts.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
         $(document).on('change', '.productcategory',function(){
            //console.log("html it change");

            var cat_id=$(this).val();
            //console.log(cat_id);
            var div=$(this).parent();
            
            var op=" ";

            $.ajax({
               type: 'get',
               url: '{!! URL::to('findMaternelName') !!}',
               data: {'id': cat_id},
               success:function(data){
                //console.log('success'); 
               // console.log(data);
               // console.log(data.length);
                op+='<option value="0" selected disabled>chose product</option>';
                for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].maternel_name+'</option>'; 
                }
                div.find('.maternel_name').html(" ");
                div.find('.maternel_name').append(op);
               },
               error:function(){
                   
               }
            });
         });
      });

    </script>
        <!-- module privé-->

        <script>
            
        
        $('#maternel_id').select2({
            width: '100%',
            placeholder: "Select an Option",
            allowClear: true
        });
        </script>
        <!-- fin du module-->

        <script>
            $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
        });
        </script>

    </body>
</html>

