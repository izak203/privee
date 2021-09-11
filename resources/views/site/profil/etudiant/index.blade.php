@extends('admin.admin')

@section('content')

@include('info.notification')

@if(Auth::user()->age)
<h1>Profil</h1>
    <table class="table table-condensed">
        <thead>
            <tr class="card-table">
                <th>ID</th>
                <th>IMG</th>
                <th>First_name</th>
                <th>Last_Name</th>
                <th>Age</th>
                <th>Droit inscription</th>
                <th>Réçu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>@if(Auth::user()->image)
                     <img src="/image/users/{{ Auth::user()->image }}" style="border-radius:50%;position:absolute;" alt="" width="50" height="50"><br><br><br><br>
                    @else
                <img src="/images/users/default.png" alt="" style="border-radius:50%;" width="50" height="50" />
                 @endif</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->age }}</td>
                @if($user->payment)
                <td>{{ $user->payment->amount }} €</td>
                <td><a href="{{ $user->payment->receipt_url }}" class="btn btn-primary">Reçu Inscription</a></td>
               @endif 
              </td>
            </tr>
        </tbody>
    </table>   
@else
<h1>Hé,{{ Auth::user()->first_name }} , Vous allez bien! bienvenue chez toi, <a href="">completer votre iscription pour commener les cours très tôt</a> </h1>
@endif  

       @if ($user->subscription('cashier')->onGracePeriod())
            <div class="alert alert-danger text-center">
            Vous avez annulé votre compte.<br>
            Vous avez accès à l'école privée Numéric suivre vos cours jusqu'à {{ $user->subscription('cashier')->ends_at->format('F d, Y') }}.
            </div>
        @endif

        @if(!$user->subscribed('cashier'))
         <div class="jumbotron text-center">
         <p>You don't have a subscription</p>
         <a href="{{ route('site.profil.etudiant.cashier.subscribe') }}" class="btn btn-success btn-lg">Subscribe</a>
         </div>
        @else
       <div class="row">
           <div class="col-sm-6">
               <div style="background-color:tomato;height:40px; color:#fff; margin-top:40px; text-align:center; font-size:20px;">
               <strong>Current: </strong>{{ $user->subscription('cashier')->stripe_plan }}
               </div>
           </div>

           <div class="col-sm-6">
               
                <h2>Update Subscription</h2>

                <form action="{{ route('site.profil.etudiant.cashier.subscribeupdate', $user->id) }}" method="POST">
                      @csrf 
                      @method('PATCH')
                      
                        <div class="form-group">
                            <select name="plan" class="form-control">
                                <option value="price_1J6ZVOLHLQv7HTRrXESCDKwh" 
                                    {{ ($user->onPlan('price_1J6ZVOLHLQv7HTRrXESCDKwh')) ? 'selected' : '' }}>
                                    Maternelle par mois (€6/mois maternelle)
                                </option>
                                <option value="price_1J5nkGLHLQv7HTRrUmy2UjMn" 
                                    {{ ($user->onPlan('price_1J5nkGLHLQv7HTRrUmy2UjMn')) ? 'selected' : '' }}>
                                    Maternelle par 3 mois (€18/3 mois maternelle)
                                </option>
                                <option value="price_1J6ZU9LHLQv7HTRrMavtLZLx" 
                                    {{ ($user->onPlan('price_1J6ZU9LHLQv7HTRrMavtLZLx')) ? 'selected' : '' }}>
                                    Maternelle annuelle (€180/Annuelle maternelle)
                                </option>
                                <option value="price_1J6ZWmLHLQv7HTRrlV3ikxjD" 
                                    {{ ($user->onPlan('price_1J6ZWmLHLQv7HTRrlV3ikxjD')) ? 'selected' : '' }}>
                                    Collège par mois (€25/mois)
                                </option>
                                <option value="price_1J6ZXwLHLQv7HTRruvu76Jxx" 
                                    {{ ($user->onPlan('price_1J6ZXwLHLQv7HTRruvu76Jxx')) ? 'selected' : '' }}>
                                    Collège par3 mois (€58/3mois)
                                </option>
                                <option value="price_1J6ZazLHLQv7HTRrkigaZVLO" 
                                    {{ ($user->onPlan('price_1J6ZazLHLQv7HTRrkigaZVLO')) ? 'selected' : '' }}>
                                    Collège annuelle (€170/mois)
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="maternel_id">Choix de classe </label>
                            <select name="maternel_id" id="maternel_id" class="form-control">
                            @foreach($maternels as $maternel)
                                <option value="{{ $maternel->id }}">{{ $maternel->maternel_name }}</option>
                                @endforeach
                            </select>
                        </div>
                   

                        <button type="submit" class="btn btn-primary">
                            {{ $user->subscription('cashier')->onGracePeriod() ? 'Reactivate' : 'Update Plan' }}
                        </button>
                    </form>

           </div>
       </div>

        @endif

        <div class="section-header">
            <h2>Billing Hystory</h2>
        </div>
        @if(count($invoices) > 0)
          <table class="table table-bordered table-striped table-hover">
               @foreach($invoices as $invoice)
                 <tr>
                     <td> {{ $invoice->date()->toFormattedDateString() }}</td>
                     <td>{{ $invoice->total() }}</td>
                     <td style="margin-right:100px;">
                     <a href="/student/profiletudiant/subscribe/download/{{ $invoice->id }}" class="btn btn-primary btn-sm">Dowload</a>
                     </td>
                 </tr>
               @endforeach
          </table>

        @else
        <div class="jumbotron text-center">
             <p>No Billing History</p>
        </div>

        @endif
<div class="section-header mt-4 mb-4">
        </div> 

        <p>Nb, si un jour vous veniez de résilier votre contrat, vous aurez le droit d'utiliser la plate-forme jusq'à la fin de la période choisie. </p>
       <div class="section-header">
            <h2>Delete subscription</h2>
        </div>
        <form action="{{ route('site.profil.etudiant.cashier.subscribedelete', $user->id) }}" method="post" class="text-right">
                @csrf
                @method('DELETE')

       <button type="submit" class="btn btn-danger">Delete subscription</button>
     </form>
      
        

@endsection