<?php

namespace App\Http\Controllers\api\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\traits\responseApi;
use App\Http\Requests\api\RegisterRequest as ApiRegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    use responseApi;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ApiRegisterRequest $request)
    {
        //validation on inputs in api\registerrequest
        $registerData = $request->validated();
        $registerData['password'] = Hash::make($request->password);
        $user = User::create($registerData); // create user in db
        $user->token = 'Bearer '.$user->createToken($request->device_name)->plainTextToken; // create token for user
        return $this->returnData(compact('user'),"Register Completed");
    }
}
