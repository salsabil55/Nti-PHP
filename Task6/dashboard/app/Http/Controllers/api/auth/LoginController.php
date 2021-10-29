<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\responseApi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\api\LoginRequest;


class LoginController extends Controller
{
    use responseApi;
    public function login(LoginRequest $request){

        // validation inside login request
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {

            return $this->returnErrorMessage('The provided credentials are incorrect.');
        }
        // create token before return not verified user because need it in another request
        $token =  'Bearer ' . $user->createToken($request->device_name)->plainTextToken;
        $user->token = $token;

        // check be verified & must email email to login 401 not authorized
        if (!$user->email_verified_at) {
            return $this->returnData(compact('user'), 'User Not Verified', 401);
        }

        return $this->returnData(compact('user'));

    }
    public function logout(Request $request){
        $user = Auth::guard('sanctum')->user();
        $token = $request->header('Authorization');
        $tokenArray = explode('|', $token); // extract token_id
        $tokenId = str_replace("Bearer ", "", $tokenArray[0]);
        $user->tokens()->where('id', $tokenId)->delete();
        return $this->returnSuccessMessage('User Has Been Successfully Logged Out');
    }
    public function logoutAll()
    {
        $user = Auth::guard('sanctum')->user();
        $user->tokens()->delete();
        return $this->returnSuccessMessage('User Has Been Successfully Logged Out From All Devices');
    }
}
