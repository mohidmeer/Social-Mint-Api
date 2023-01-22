<?php

namespace App\Http\Middleware;

use App\Models\Request as ModelsRequest;
use Closure;
use Illuminate\Http\Request;

class RequestLogger
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
        
        $res=$next($request);
        ModelsRequest::create([
            'user_id' => (auth()->user()->id),
            'host' => $request->server('HTTP_HOST'),
            'route' => $request->server('REQUEST_URI'),
            'response' =>$res->status(),
            'meathod' => $request->server('REQUEST_METHOD'),
            'user_agent' => $request->header('user-agent'),
            'duration' => $request->server('REQUEST_TIME')
        ]);
        return $res;
    }
}
