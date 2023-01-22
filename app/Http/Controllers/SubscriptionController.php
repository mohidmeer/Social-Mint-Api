<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{

    public function index()
    {
        $subscriptions=auth()->user()->subscriptions()->active()->get();
        
        return view('subscriptions.index' ,compact('subscriptions'));
    }





    public function subscribe(Request $request)
    {
        $plan = Plan::find($request->plan);
        $subscription = $request->user()->newSubscription($plan->name, $plan->stripe_plan)
        ->create($request->token);
        return redirect()->route('pricing')->with('success','Subscription created successfully');
    }




    public function cancel($name)
    {
        Auth::user()->subscription($name)->cancel();   
        return redirect()->back()->with('success','Subscription Cancelled successfully');
    }




    
    public function resume($name)
    {
        Auth::user()->subscription($name)->resume();   
        return redirect()->back();
    }
}
