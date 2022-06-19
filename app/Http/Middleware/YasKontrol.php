<?php

namespace App\Http\Middleware;

use Closure;

class YasKontrol
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
        $yas=19;
        if($yas<18){
          //  return "yaşını 18 den küçük";
          return redirect('/welcome');

        }
        return $next($request);
    }
}
