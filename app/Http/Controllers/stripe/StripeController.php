<?php

namespace App\Http\Controllers\stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    //

    // public function stripe()
    // {
    //     return view('stripe');
    // }

    // public function stripePost(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //    $response =  Stripe\Charge::create ([
    //             "amount" => 100 * 100,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "payment from ali raza."
    //     ]);
   
    //     Session::flash('success', 'Payment successful!');
           
    //     return back();
    // }
    
}
