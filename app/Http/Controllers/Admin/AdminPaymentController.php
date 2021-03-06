<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::latest()->orderBy('id','DESC')->paginate(5);

        return view('admin.payment.index', compact('payments'));
    }
    
    //
}
