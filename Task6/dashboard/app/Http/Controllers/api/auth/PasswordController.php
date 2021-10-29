<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\responseApi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\api\NewPasswordRequest;
use App\Http\Requests\api\VerifyEmailRequest;

class PasswordController extends Controller
{
    use responseApi;
    public function forgetPassword(VerifyEmailRequest $request)
    {

        // check that return email from db is equal email in reuest
        $user = User::WHERE('email',$request->email)->first();
        // create code to use it to send email
        $user->token = 'Bearer '.$user->createToken($request->device_name)->plainTextToken;

        return $this->returnData(compact('user'),'Email Exists');

    }
    public function changePassword(NewPasswordRequest $request){

        // first we need know which user want change password
        $authenticatedUser = Auth::guard('sanctum')->user();
        // take instance from user to handle with property of password inside it
        $user = User::find($authenticatedUser->id);
        // check if new password equal old password
        if(Hash::check($request->password, $user->password)){
            return $this->returnErrorMessage('You Have Entered Your Old Password');
        }
        $user->password = Hash::make($request->password);
        $user->save(); // save new password in db
        $user->token = $request->header('Authorization');
        return $this->returnData(compact('user'),'password changed successfully');
    }
}
