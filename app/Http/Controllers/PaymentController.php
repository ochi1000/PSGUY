<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Fix;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\User;

// use Unicodeveloper\Paystack\Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $user = Auth::user();

        $service = Service::create([
                'user_id' => $user->id,
                'user_email' => $user->email,
                'user_name' => $user->name,
                'user_phone' => $user->phone,
                'state' => $user->state,
                'address' => $user->address,
                'total' => $paymentDetails['data']['amount']/100,
                'error' => $paymentDetails['data']['authorization']['authorization_code'],
            ]);

        foreach (Cart::content() as $cartItem) {
            # code...
            Fix::create([
                'service_id'=>$service->id,
                'device_name'=>$cartItem->name,
                'problem'=>$cartItem->options['description'],
                'extra_description'=>$cartItem->options['additional_description'],
                'mark'=>$cartItem->options['mark'],
            ]);
        }

        Cart::destroy();

        return view('thankyou');
        // print_r($paymentDetails['data']['authorization']['authorization_code']) ;
        // return redirect('/');
        // Mail::to($user)->send(new TestingMail);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
