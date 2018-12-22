<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Stripe\Stripe;
use \Stripe\Token;

class SubscriptionController extends Controller
{
	
    public function sms()
    {
    	return view('Subscription.sms',['user'=>Auth::user()]);
    }

    public function email()
    {
    	return view('Subscription.email',['user'=>Auth::user()]);
    }

    public function slack()
    {
    	return view('Subscription.slack',['user'=>Auth::user()]);
    }

    public function subscription()
    {
    	return view('Subscription.subscription');
    }

    public $user;

    public function subscribe(Request $request)
    {
        $this->user = Auth::user();
    	$this->user->newSubscription('Main', 'sms-plan')->create($request->stripeToken,[
    		'email'=>$request->stripeEmail
    	]);

    	return redirect()->route('home')->with('notice','Congratulation your subscription was successfull'); 
    }
}
