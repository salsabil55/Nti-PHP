<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\traits\responseApi;


class AcceptJson
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
        if(! $request->wantsJson()){
            return $this->returnErrorMessage('Api Must Accepts JSON');
        }
        return $next($request);

    }
}
