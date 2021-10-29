<?php

namespace App\Http\Middleware;
use App\Http\traits\responseApi;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
class AppApiKey
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
        // check if key not send or not equal app-key stored in file
        // we can store in env file but sometime conflict when use cache of config
        if(! Arr::has($request->header(), 'app-api-key') || config('app.API_APP_KEY') != $request->header('app-api-key')){
            return $this->returnErrorMessage('Invalid API Request');
        }
        return $next($request);
    }
}
