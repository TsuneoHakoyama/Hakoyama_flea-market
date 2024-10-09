<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function payByCard(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.st_key')); //シークレットキー

        $charge = Charge::create(array(
            'amount' => $request->price,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));

        $param = [
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
            'price' => $request->price,
            'payment_id' => $request->payment_id
        ];
        Purchase::create($param);
        
        return view('purchase-complete');
    }
}
