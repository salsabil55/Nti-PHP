<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\ProfileController;
use App\Http\Controllers\api\auth\PasswordController;
use App\Http\Controllers\api\auth\RegisterController;
use App\Http\Controllers\api\auth\EmailVerificationCode;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// url => products/all , body => no body , method = GET , headers => accept : application/json
// , reposnse => json => all products
Route::group(['prefix'=>'products','middleware'=>'verify.api'],function(){
    Route::get('/',[ProductController::class,'index']);
    Route::get('create',[ProductController::class,'create']);
    Route::get('edit/{id}',[ProductController::class,'edit']);
    Route::post('store',[ProductController::class,'store']);
    Route::put('update/{id}',[ProductController::class,'update']); //->where('id', '[0-9]+')
    Route::delete('destroy/{id}',[ProductController::class,'destroy']);
});


// api

Route::group(['prefix'=>'users'],function(){
    //guest
    Route::middleware(['guest.api'])->group(function () {

    Route::post('register',RegisterController::class);
    Route::post('login',[LoginController::class,'login']);
    Route::post('forget-password',[PasswordController::class,'forgetPassword']);
    });
    //authenticated
    Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('send-code',[EmailVerificationCode::class,'sendCode']);
    Route::get('verify-user',[EmailVerificationCode::class,'verifyUser']);
});
    //verified
    Route::middleware(['verify.api'])->group(function () {
    Route::get('logout',[LoginController::class,'logout']);
    Route::get('logout-all',[LoginController::class,'logoutAll']);
    Route::get('profile',ProfileController::class);
    Route::post('change-password',[PasswordController::class,'changePassword']);

    });


});
