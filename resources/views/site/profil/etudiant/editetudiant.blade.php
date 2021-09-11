<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
  @import url(https://fonts.googleapis.com/css?family=Nunito);@charset "UTF-8";

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Oswald", Arial, Helvetica, sans-serif;
  text-transform: uppercase;
  font-style: italic;
}

.plan-price {
  font-family: "Oswald", Arial, Helvetica, sans-serif;
}

.subscription-option input[type=radio] {
  display: none;
}

.subscription-option label {
  display: block;
  width: 100%;
  min-height: 200px;
  border-radius: 4px;
  background: #F2F2F2;
  color: #545454;
  font-size: 40px;
  text-align: center;
  cursor: pointer;
  padding-top: 50px;
  transition: 0.3s ease all;
}

.subscription-option .plan-name {
  display: block;
  font-size: 24px;
}

.subscription-option input[type=radio]:checked + label {
  background: #0B79EE;
  color: #FFF;
}
</style>
    <style>
  /*# sourceMappingURL=ui.css.map */

  .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid #ccd0d2;
        border-radius: 4px;
        background-color: white;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
      }
      
          .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
      }
      
      .StripeElement--invalid {
        border-color: #fa755a;
      }
      
      .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
      }
      
      #card-errors {
        color: #fa755a;
      }
</style>
<script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<div class="container-fluid">
@include('info.notification')
<h1 style="background-color:tomato;color:#fff;height:100px;line-height:100px;text-align:center;margin-bottom:40px;">Droit d'inscription</h1>
<form action="{{ route('site.profil.etudiant.updateetudiant', $user->id) }}" method="POST" enctype="multipart/form-data" id="payment-form">
@csrf 
@method('PATCH')
    
<div class="form-group">
     <div class="row">
        <div class="col-md-6 mb-4">
            <div class="subscription-option">
                <input type="radio" id="standard" name="price" value="100" checked>
                    <label for="standard">
                        <span class="plan-price titre_tertial">100 €<small> / Droit d' inscription</small></span>
                        <span class="plan-name titre_tertial">Maternelle</span>
                    </label>
            </div>

        </div>
          <!-- test -->
        <div class="col-md-6 mb-4">
            <div class="subscription-option">
                 <input type="radio" id="excellente" name="price" value="200">
                    <label for="excellente">
                        <span class="plan-price titre_tertial">200 €<small> / Droit d' inscription</small></span>
                        <span class="plan-name titre_tertial">Primaire</span>
                    </label>
            </div>
        </div>
        <!-- end test -->
        <div class="col-md-6">
            <div class="subscription-option">
                  <input type="radio" id="college" name="price" value="300">
                      <label for="college">
                          <span class="plan-price titre_tertial">300 €<small> / Droit d' inscription</small></span>
                          <span class="plan-name titre_tertial">Collège</span>
                      </label>
            </div>
        </div>
         <!-- end test -->
         <div class="col-md-6">
            <div class="subscription-option">
                 <input type="radio" id="lycee" name="price" value="400">
                    <label for="lycee">
                        <span class="plan-price titre_tertial">400€ €<small> / Droit d' inscription</small></span>
                        <span class="plan-name titre_tertial">Lycée</span>
                    </label>
            </div>
        </div>
         <!-- end test -->
  
<div class="col-md-12">
                                   
    <div class="form-group">
        <label for="card-element">
            Credit or debit card
            </label>
            <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>
            </div>
    </div>
         <div class="col-md-6">
           <div class="checkout-btn">
            <button type="submit" class="btn btn-primary">Payer votre Inscription</button>
    </div>

    <!--<div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="mb-3">
                    <input type="radio" name="price" value="100">100 € inscription maternelle<br>
                    <input type="radio" name="price" value="200">200 € inscription Primaire<br>
                    <input type="radio" name="price" value="300">300 € inscription Collège<br>
                    <input type="radio" name="price" value="400">400 € inscription Lycée<br>
                </label>
            </div>
        </div>
    </div> --> 

   <!-- <div class="form-group">
        <label for="card-element">
        Credit or debit card
        </label>-->
       <!-- <div id="card-element">--> 
        <!-- A Stripe Element will be inserted here. -->
        <!--</div>--> 

        <!-- Used to display Element errors. -->
       <!-- <div id="card-errors" role="alert"></div>
    </div>

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Completer votre inscription</button>
    </div> --> 
</form>
    
</div>
<script>
       var stripe = Stripe('pk_test_B221brafzN6MMhwb9yB4SHNg');
       var elements = stripe.elements();

       // Custom styling can be passed to options when creating an Element.
        var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: '#32325d',
        },
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
          style: style,
          hidePostalCode: true
          });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
            // Inform the customer that there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
            } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
            }
        });
        });

        function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
        }
   </script> 
</body>
</html>