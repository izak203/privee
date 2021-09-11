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
  <div class="container-fluid mt-4">
@include('info.notification')
<h1 style="background-color:tomato;color:#fff;height:100px;line-height:100px;text-align:center;margin-bottom:40px;">Paiement Scolaire</h1>
<form action="{{ route('site.profil.etudiant.cashier.subscribepost') }}" method="post" id="payment-form" data-secret="{{ $intent->client_secret }}">
@csrf
  <div class="form-group">
     <div class="row">
        <div class="col-md-4">
            <div class="subscription-option">
                <input type="radio" id="polie" name="plan" value="price_1J6ZVOLHLQv7HTRrXESCDKwh" checked>
                    <label for="polie">
                        <span class="plan-price titre_tertial">6 € <small>/mois</small></span>
                        <span class="plan-name titre_tertial">Maternelle</span>
                    </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="subscription-option">
                <input type="radio" id="standard" name="plan" value="price_1J5nkGLHLQv7HTRrUmy2UjMn">
                    <label for="standard">
                        <span class="plan-price titre_tertial">18 €<small>/3 mois</small></span>
                        <span class="plan-name titre_tertial">Maternelle</span>
                    </label>
            </div>

        </div>
          <!-- test -->
        <div class="col-md-4">
            <div class="subscription-option">
                 <input type="radio" id="excellente" name="plan" value="price_1J6ZU9LHLQv7HTRrMavtLZLx">
                    <label for="excellente">
                        <span class="plan-price titre_tertial">180 €<small>/Annuel</small></span>
                        <span class="plan-name titre_tertial">Maternelle</span>
                    </label>
            </div>
        </div>
        <!-- end test -->
        <div class="col-md-4">
            <div class="subscription-option">
                  <input type="radio" id="college" name="plan" value="price_1J6ZWmLHLQv7HTRrlV3ikxjD">
                      <label for="college">
                          <span class="plan-price titre_tertial">25 €<small>/mois</small></span>
                          <span class="plan-name titre_tertial">Collège</span>
                      </label>
            </div>
        </div>
         <!-- end test -->
         <div class="col-md-4">
            <div class="subscription-option">
                 <input type="radio" id="lycee" name="plan" value="price_1J6ZXwLHLQv7HTRruvu76Jxx">
                    <label for="lycee">
                        <span class="plan-price titre_tertial">58€ €<small>/3 Mois 1 € de reduction</small></span>
                        <span class="plan-name titre_tertial">Collège</span>
                    </label>
            </div>
        </div>
         <!-- end test -->

         <div class="col-md-4">
            <div class="subscription-option">
                 <input type="radio" id="universite" name="plan" value="price_1J6ZazLHLQv7HTRrkigaZVLO">
                    <label for="universite">
                        <span class="plan-price titre_tertial">170€ €<small>/Annuel</small></span>
                        <span class="plan-name titre_tertial">Collège</span>
                    </label>
            </div>
        </div>
         <!-- end test -->
  
<div class="col-md-6">
    <div class="form-group">
      <label for="cardholder-name"><span style="color:red">Ajouter un Pseudo</span> </label>
      <input id="cardholder-name" type="text" class="px-2 py-2 border form-control">
    </div>
</div>
<div class="col-md-6">
                                   
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
            <button type="submit" class="btn btn-primary">Payer votre scolarité</button>
         </div>
    
</form>

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
        var cardHolderName = document.getElementById('cardholder-name');
        var clientSecret = form.dataset.secret;

        form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const { setupIntent, error } = await stripe.confirmCardSetup(
          clientSecret, {
                  payment_method: {
                      card,
                      billing_details: { name: cardHolderName.value }
                  }
              }
          );

          if (error) {
              // Display "error.message" to the user...
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
          } else {
              // The card has been verified successfully...
              
              stripeTokenHandler(setupIntent);
          }

        /*stripe.createToken(card).then(function(result) {
            if (result.error) {
            // Inform the customer that there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
            } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
            }
        });*/
        });

        function stripeTokenHandler(setupIntent) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'paymentMethod');
        hiddenInput.setAttribute('value', setupIntent.payment_method);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
        }
   </script> 
   </div>
  </body>
</html>

