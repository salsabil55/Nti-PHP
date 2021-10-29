<?php

namespace App\Http\Controllers\api\auth;

use Illuminate\Http\Request;
use App\Http\traits\responseApi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use responseApi;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
       // return data from token
       $user = Auth::guard('sanctum')->user();
       $userToken = $request->header('Authorization');
       $user->token= $userToken;
       return $this->returnData(compact('user'),'Profile Data');
    }
}
