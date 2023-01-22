<?php

namespace App\Http\Middleware;

use App\Models\Plan;
use Closure;
use Illuminate\Http\Request;

class SubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $plans=Plan::get();
        foreach ($plans as $key=>$plan){
            if (auth()->user()->subscribed($plan->name)){
                return $next($request);
            }
            
           } 
            if (auth()->user()->trials>0){
                 auth()->user()->decrement('trials');
                return $next($request);
            }


        return ["message"=>'Your free trial is over please subscribe to use further' ];
    }
}
