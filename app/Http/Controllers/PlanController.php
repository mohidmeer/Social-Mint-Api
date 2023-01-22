<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();

        return view('plans.plan',compact('plans'));
    }
    public function show($id)
    {
        $plan = Plan::where('id',$id)->get();
        $plan=$plan[0];
        Auth::user()->createOrGetStripeCustomer();
        $intent = auth()->user()->createSetupIntent();
        return view('plans.show',compact('plan','intent'));
    }
    public function billingPortal(Request $request){

        return $request->user()->redirectToBillingPortal();
    }
}
