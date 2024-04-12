<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Charge;

use Carbon\Carbon;

use App\Models\Reserve;

class PaymentController extends Controller
{
    public function pay(Request $request, $id)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $reserve = Reserve::with('shop_menu')->where('id', $id)->first();

        $charge = Charge::create(array(
            'amount' => $reserve->shop_menu->price,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));

        $now = Carbon::now();

        $reserve = Reserve::find($id);
        $reserve->payed_time = $now;
        $reserve->updated_at = $now;
        $reserve->save();


        return back();
    }
}
