<?php

namespace App\Http\Controllers\Profil;

use PDF;
use App\Models\User;
use App\Models\Moyenne;
use App\Models\Payment;
use App\Models\Category;
use App\Models\Identite;
use App\Models\Maternel;
use Illuminate\Support\Str;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EtudiantRequest;

class ProfilEtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //$user = $request->user();
        $invoices = $user->subscribed('cashier') ? $user->invoices() : null;
        $maternels = Maternel::all();

        return view('site.profil.etudiant.index', compact('user', 'invoices', 'maternels'));
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBulleetinNoteExercice()
    {
        $user = Auth::user();
        $moyennes = $user->moyennes()->where('type_id', 2)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.etudiant.bulletinelevenoteexercice', [
            'user' => $user, 
            'moyennes' => $moyennes
        ]);
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBulleetinNoteDevoir()
    {
        $user = Auth::user();
        $moyennes = $user->moyennes()->where('type_id', 1)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.etudiant.bulletinelevenotedevoir', [
            'user' => $user, 
            'moyennes' => $moyennes
        ]);
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBulleetinElevePremierTrimestre()
    {   
            //$coefficiants = Moyenne::where('user_id', Auth::user()->id)->sum('coefficiant');
            $coefficiants = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 1)->sum('coefficiant');
            $bulletins = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 1)->sum('francais');
            //$bulletins = Moyenne::where('user_id', Auth::user()->id)->sum('francais');
            $sommetotal = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 1)->sum('total');
            //$sommetotal = Moyenne::where('user_id', Auth::user()->id)->sum('total');

                $total = ($sommetotal / $coefficiants);
                (round($total, 2));  
           
            $user = Auth::user();
            $moyennes = $user->moyennes()->where('type_id', 3)->where('bulletin_id', 1)->orderBy('id','DESC')->paginate(12);
           
            return view('site.profil.etudiant.bulletinelevepremiertrimestre', [
            'user' => $user, 
            'moyennes' => $moyennes,
            'total' => $total,
            'bulletins' => $bulletins,
            'coefficiants' => $coefficiants,
            'sommetotal' => $sommetotal
        ]); 
      
        //
    }

    public function  userBulleetinElevePremierTrimestrePdf()
    {
       
            //$coefficiants = Moyenne::where('user_id', Auth::user()->id)->sum('coefficiant');
            $coefficiants = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 1)->sum('coefficiant');
            $bulletins = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 1)->sum('francais');
            //$bulletins = Moyenne::where('user_id', Auth::user()->id)->sum('francais');
            $sommetotal = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 1)->sum('total');
            //$sommetotal = Moyenne::where('user_id', Auth::user()->id)->sum('total');

                $total = ($sommetotal / $coefficiants);
                (round($total, 2));  
           
            $user = Auth::user();
            $moyennes = $user->moyennes()->where('type_id', 3)->where('bulletin_id', 1)->orderBy('id','DESC')->paginate(12);
         
            $fileName = 'moyenne-result'.now()->toDateTimeString().'.pdf';
            $pdf = \PDF::loadView('pdf.moyenne-result', compact(
                'user',
                'moyennes',
                'total',
                'bulletins',
                'coefficiants',
                'sommetotal'));
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(public_path().DIRECTORY_SEPARATOR.'moyenne-result.pdf');
            // Finally, you can download the file using download function
            return $pdf->download($fileName);
      
    }

    public function  userBulleetinEleveDeuxiemeTrimestrePdf()
    {
       
            //$coefficiants = Moyenne::where('user_id', Auth::user()->id)->sum('coefficiant');
            $coefficiants = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 2)->sum('coefficiant');
            $bulletins = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 2)->sum('francais');
            //$bulletins = Moyenne::where('user_id', Auth::user()->id)->sum('francais');
            $sommetotal = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 2)->sum('total');
            //$sommetotal = Moyenne::where('user_id', Auth::user()->id)->sum('total');

                $total = ($sommetotal / $coefficiants);
                (round($total, 2));  
           
            $user = Auth::user();
            $moyennes = $user->moyennes()->where('type_id', 3)->where('bulletin_id', 2)->orderBy('id','DESC')->paginate(12);
         
            $fileName = 'deuxiemetrimestre-result'.now()->toDateTimeString().'.pdf';
            $pdf = \PDF::loadView('pdf.deuxiemetrimestre-result', compact(
                'user',
                'moyennes',
                'total',
                'bulletins',
                'coefficiants',
                'sommetotal'));
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(public_path().DIRECTORY_SEPARATOR.'deuxiemetrimestre-resultt.pdf');
            // Finally, you can download the file using download function
            return $pdf->download($fileName);
      
    }

    public function  userBulleetinEleveTroisiemeTrimestrePdf()
    {
       
            //$coefficiants = Moyenne::where('user_id', Auth::user()->id)->sum('coefficiant');
            $coefficiants = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 3)->sum('coefficiant');
            $bulletins = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 3)->sum('francais');
            //$bulletins = Moyenne::where('user_id', Auth::user()->id)->sum('francais');
            $sommetotal = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 3)->sum('total');
            //$sommetotal = Moyenne::where('user_id', Auth::user()->id)->sum('total');

                $total = ($sommetotal / $coefficiants);
                (round($total, 2));  
           
            $user = Auth::user();
            $moyennes = $user->moyennes()->where('type_id', 3)->where('bulletin_id', 3)->orderBy('id','DESC')->paginate(12);
         
            $fileName = 'troisiemetrimestre-result'.now()->toDateTimeString().'.pdf';
            $pdf = \PDF::loadView('pdf.troisiemetrimestre-result', compact(
                'user',
                'moyennes',
                'total',
                'bulletins',
                'coefficiants',
                'sommetotal'));
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(public_path().DIRECTORY_SEPARATOR.'troisiemetrimestre-result.pdf');
            // Finally, you can download the file using download function
            return $pdf->download($fileName);
      
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBulleetinEleveDeuxiemeTrimestre()
    {
            //$coefficiants = Moyenne::where('user_id', Auth::user()->id)->sum('coefficiant');
            $coefficiants = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 2)->sum('coefficiant');
            $bulletins = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 2)->sum('francais');
            //$bulletins = Moyenne::where('user_id', Auth::user()->id)->sum('francais');
            $sommetotal = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 2)->sum('total');
            //$sommetotal = Moyenne::where('user_id', Auth::user()->id)->sum('total');

                $total = ($sommetotal / $coefficiants);
                (round($total, 2));  
           
            $user = Auth::user();
            $moyennes = $user->moyennes()->where('type_id', 3)->where('bulletin_id', 2)->orderBy('id','DESC')->paginate(12);

        return view('site.profil.etudiant.bulletinelevedeuxiemetrimestre', [
            'user' => $user, 
            'moyennes' => $moyennes,
            'total' => $total,
            'bulletins' => $bulletins,
            'coefficiants' => $coefficiants,
            'sommetotal' => $sommetotal
        ]);
        //
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBulleetinEleveTroisiemeTrimestre()
    {
           //$coefficiants = Moyenne::where('user_id', Auth::user()->id)->sum('coefficiant');
           $coefficiants = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 3)->sum('coefficiant');
           $bulletins = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 3)->sum('francais');
           //$bulletins = Moyenne::where('user_id', Auth::user()->id)->sum('francais');
           $sommetotal = DB::table('moyennes')->where('user_id', Auth::user()->id)->where('type_id', 3)->where('bulletin_id', 3)->sum('total');
           //$sommetotal = Moyenne::where('user_id', Auth::user()->id)->sum('total');

               $total = ($sommetotal / $coefficiants);
               (round($total, 2));  
          
           $user = Auth::user();
           $moyennes = $user->moyennes()->where('type_id', 3)->where('bulletin_id', 3)->orderBy('id','DESC')->paginate(12);
        

        return view('site.profil.etudiant.bulletinelevetroisiemetrimestre', [
            'user' => $user, 
            'moyennes' => $moyennes,
            'total' => $total,
            'bulletins' => $bulletins,
            'coefficiants' => $coefficiants,
            'sommetotal' => $sommetotal
        ]);
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identites = Identite::all();
        $maternels = Maternel::all();
        $categories = Category::all();

        return view('site.profil.etudiant.create', compact('identites', 'maternels', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtudiantRequest $request)
    {
        
        $user = new User();
        $user->identite_id = $request->identite_id;
        $user->maternel_id = $request->maternel_id;
        $user->category_id = $request->category_id;
        $user->city = $request->city;
        $user->first_name = $request->first_name;
        $user->postalcode = $request->postalcode;
        $user->numberunique = random_int(12345678, 123456789);
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->country = $request->country;
        $user->age = $request->age;
        $user->tel = $request->tel;
        $user->price = $request->price;
        $user->diploma = $request->diploma;
        $user->payment_method = $request->payment_method;
        $user->birth = $request->birth;
        $user->image('image', $user);
        $user->save();

        if (request('payment_method') == 'numeric') {
            return redirect()->route('site.profil.etudiant.cashier.subscribe')->withSecondary('Votre inscription est terminée, vous pouvez deja commencé les cours'); 
         } 
         
         if(request('payment_method') == 'normale'){

            return redirect()->route('site.profil.etudiant.editetudiant', [$user->id])->withSecondary('Votre inscription est terminée!');
         }
        
        //
    }

     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editetudiant(User $user)
    {
        return view('site.profil.etudiant.editetudiant', compact('user'));
        //
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateetudiant(Request $request, User $user)
    {
       
        try{
            $stripe = new Stripe('sk_test_EFIIcrnLYd0ncJjw02otZOkv');
            $charge = $stripe->charges()->create([
                'amount' => $request->price,
                'currency' => 'eur',
                'source' => $request->stripeToken,
                'description' => 'description',
                'receipt_email' => $request->email,
                'metadata'=>[
    
                ]
            ]);

            if ($charge) {
                $payment = new Payment();
                //$payment->id = $charge['id'];
                $payment->amount = $charge['amount'] / 100;
                $payment->currency = $charge['currency'];
                $payment->payment_method = $charge['payment_method'];
                $payment->receipt_url = $charge['receipt_url'];
                $payment->status = $charge['status'];
                if ( $payment->save()) {
                //-----------------------------------------------------//
                $user->payment_id = $payment->id;
                $user->save();
            }
            return redirect()->route('site.profil.etudiant.cashier.subscribe')->withSecondary('Votre inscription est terminée, vous pouvez deja commencé les cours');
          }
        }catch(Exception $e){
            'eurreur';
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe()
    {
        return view('site.profil.etudiant.cashier.subscribe', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
        //
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribePost(Request $request)
    {
            auth()->user()->newSubscription('cashier', $request->plan)->create($request->paymentMethod);

        return redirect()->route('site.ecoleprivenumeric.index')->withSuccess('Votre inscription est terminer');
        //
    }

    /**
     * Update the subscription
     */
    public function updateSubscription(Request $request)
    {
        $user = $request->user();

        // get the plan
        $plan = $request->input('plan');        

        // if a user is cancelled
        if ($user->subscribed('cashier') and $user->subscription('cashier')->onGracePeriod()) {

            if ($user->onPlan($plan)) {
                // resume the plan
                $user->subscription('cashier')->resume();
            } else {
                // resume and switch plan
                $user->subscription('')->resume()->swap($plan);
            }

            
            $user->maternel_id = $request->maternel_id;
            $user->save();

        // if not cancelled, and switch
        } else {
            // change the plan
            $user->subscription('cashier')->swap($plan);
            $user->maternel_id = $request->maternel_id;
            $user->save();
        }

        return redirect('/student/profiletudiant')->with(['success' => 'Subscription is update.']);
    }
    
     /**
     * Download an invoice
     */
    public function subscribeDownload($invoiceId)
    {
        return Auth::user()->downloadInvoice($invoiceId, [
            'vendor'  => 'ecole privée numéric',
            'product' => 'Monthly Subscription, or trimetrielle, annuel'
        ]);
    }

    /**
     * Delete subscription
     */
    public function subscribeDelete(User $user)
    {
        //$user = $request->user();

            $user->subscription('cashier')->cancel();
       
        return redirect('/student/profiletudiant')->with(['success' => 'Subscription cancelled.']);
    }

}
