<?php

namespace App\Http\Middleware;

use Closure;

class DeleteAd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() == null){
            return redirect()
                ->route('home')
                ->withErrors(['not_allowed' => 'Your are not logged in.']);;
        }
        if ($request->id !== null){
            $ad =\App\Ad::find($request->id);
        }
        if ($request->user()->cannot('delete',$ad)){
            return redirect()
                ->route('home')
                ->withErrors(['not_allowed' => 'You can`t delete this ad.']);
        }
        return $next($request);
    }
}
