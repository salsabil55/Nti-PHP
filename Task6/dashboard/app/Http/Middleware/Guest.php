<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\traits\responseApi;
use Illuminate\Support\Facades\Auth;

class Guest
{
    use responseApi;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('sanctum')->check()){
            return $this->returnErrorMessage('You Can\'t Access This API');
        }
        return $next($request);
    }
}
