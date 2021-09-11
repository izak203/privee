<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Profil Etudiant</title>
        <style>
             
        .file {
            visibility: hidden;
            position: absolute;
            }
        
        </style>
        <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
<form action="{{ route('site.profil.etudiant.store') }}" method="POST" enctype="multipart/form-data" id="payment-form">
@csrf 
<div class="form-row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="small mb-1" for="identite_id">Identité </label>
                <select name="identite_id" id="identite_id" class="form-control">
                    @foreach($identites as $identite)
                    <option value=" {{ $identite->id }}">{{ $identite->identite_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="small mb-1" for="maternel_id">Choix de classe </label>
                <select name="maternel_id" id="maternel_id" class="form-control">
                   @foreach($maternels as $maternel)
                    <option value="{{ $maternel->id }}">{{ $maternel->maternel_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="small mb-1" for="category_id">Catégories </label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
   </div>
   <div class="form-row">
       <div class="col-md-6">
           <div class="form-group">
               <label for="birth" class="mb-1">Date de naissance</label>
               <input type="date" name="birth" class="form-control py-4" placeholder="Ajouter votre date de naissance" value="{{ old('birth') }}" required>
            </div>
       </div>
       <div class="col-md-6">
            <div class="form-group">
                <label for="postalcode" class="mb-1">Code postale: </label>
                <input type="text" name="postalcode" class="form-control py-4"  id="postalcode" placeholder=" Ajouter un postalcode"  value="{{ old('postalcode') }}" required>
            </div>
        </div>
</div>
   <div class="form-row">
       <div class="col-md-6">
           <div class="form-group">
               <label for="first_name" class="mb-1">Nom</label>
               <input type="text" name="first_name" class="form-control py-4" placeholder="Ajouter un nom"  value="{{ old('first_name') }}" required>
            </div>
       </div>
       <div class="col-md-6">
           <div class="form-group">
               <label for="last_name" class="mb-1">Prenom</label>
               <input type="text" name="last_name" class="form-control py-4" placeholder="Ajouter un prenom"  value="{{ old('last_name') }}" required>
            </div>
       </div>
   </div>
   <div class="form-row">
       <div class="col-md-6">
           <div class="form-group">
               <label for="email" class="mb-1">Email</label>
               <input type="text" name="email" class="form-control py-4" placeholder="Ajouter un email"  value="{{ old('email') }}" required>
            </div>
       </div>
       <div class="col-md-6">
            <div class="form-group">
                <label for="diploma" class="mb-1">Diplôme: </label>
                <input type="text" name="diploma" class="form-control py-4"  id="diploma" placeholder=" Ajouter votre dernier diplôme"  value="{{ old('diploma') }}" required>
            </div>
        </div>
   </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="city" class="mb-1">Ville: </label>
                <input type="text" name="city" class="form-control py-4" id="city" placeholder="Ajouter une ville" value="{{ old('city') }}"  required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address" class="mb-1">Adresse: </label>
                <input type="text" name="address" class="form-control py-4"  id="address" placeholder=" Ajouter une adresse"  value="{{ old('address') }}" required>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="age" class="mb-1">Age: </label>
                <input type="number" name="age" class="form-control py-4" id="age" placeholder=" Ajouter votre age"  value="{{ old('age') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tel" class="mb-1">Téléphone </label>
                <input type="text" name="tel" class="form-control py-4"  id="tel" placeholder=" Ajouter un N° de tél"  value="{{ old('tel') }}" required>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country" class="mb-1">Pays: </label>
                <input type="text" name="country" class="form-control py-4" id="country" placeholder=" Ajouter votre pays"  value="{{ old('country') }}" required>
            </div>
        </div>

   <!-- upload image bootstrap preview --> 
     
          <div class="ml-2 col-sm-12">
                <div id="msg"></div>
               
                    <input type="file" name="image" class="file" accept="image/*" value="{{ old('image') }}">
                    <div class="input-group my-3">
                    <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                    <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary">Télécharger...</button>
                    </div>
                    </div>
                
                </div>
                <div class="ml-2 col-sm-4">
                <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
              </div>
        </div>
            <!-- -->
    <div class="form-row">
       <div class="col-md-6">
           <div class="form-group">
               <label for="password" class="mb-1">Mot de passe</label>
               <input type="password" name="password" class="form-control py-4" placeholder="Ajouter un nom"  value="{{ old('password') }}" required autocomplete="new-password">
            </div>
       </div>
       <div class="col-md-6">
           <div class="form-group">
               <label for="password-confirm" class="mb-1">Confirmer le mot de passe</label>
               <input type="password" name="password_confirmation" class="form-control py-4" placeholder="Ajouter un prenom"  value="{{ old('password_confirmation') }}" required autocomplete="new-password">
            </div>
       </div>
   </div>

    
   <div class="form-row">
    <div class="form-check">
      <label for="payment_method" class="form-check-label"> 
                      
    <input type="radio" class="form-check-input" name="payment_method" value="normale"> Cursus scolaire
    </label> 
    </div>   
     
    <div class="form-check">
                <label for="payment_method" class="form-check-label"> 
                      <input type="radio" class="form-check-input" name="payment_method" value="numeric" checked>Module Numéric
                </label> 
            </div>   
     
    </div> 

     

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Completer votre inscription</button>
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
