<?php

namespace App\Http\Controllers\api\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\traits\responseApi;


class EmailVerificationCode extends Controller
{
    use responseApi;
   public function sendCode(Request $request){
        // retrieve token to determin user
        $userToken = $request->header('Authorization');
        // return data of user has this token to send code in email
        $authenticatedUser = Auth::guard('sanctum')->user();
        // generate code
        $user = User::find($authenticatedUser->id);
        $code = rand(10000,99999);
        $user->code = $code; // update value of code in db with new value
        $user->save();

        //send Email

        $user->token = $userToken; // add token to object user

        return $this->returnData(compact('user'),'Mail sent Successfully');
   }

   public function verifyUser(Request $request){
        // retrieve token to determin user
        $userToken = $request->header('Authorization');
        // return data of user has this token to send code in email
        $authenticatedUser = Auth::guard('sanctum')->user();
        $user = User::find($authenticatedUser->id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();
        $user->token = $userToken;
        return $this->returnData(compact('user'),'User has been verified Successfully');

   }



        // if i want to make one function include similar function in same class make private funct
            // private function verify ($updatedColumn,$updatedValue,$message,$request){}
            // and call it in side func
         // return $this->verify('email_verified_at',date('Y-m-d H:i:s'),'User Has Been Verifeid Successfully',$request);


}
