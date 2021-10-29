<?php

namespace App\Http\Middleware;
use Closure;

use Illuminate\Http\Request;
use App\Http\traits\responseApi;
use Illuminate\Support\Facades\Auth;

class VerifiedUser
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
        if(! Auth::guard('sanctum')->check()){ // check if user login or not
            return $this->returnErrorMessage('Unauthorized User');
        }

        if(! Auth::guard('sanctum')->user()->email_verified_at){ //check if user verified to login
            return $this->returnErrorMessage('Not Verified User');
        }

        return $next($request);
    }

}
