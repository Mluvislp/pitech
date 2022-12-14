<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/hello',function(){
    return "HE";
});
Route::post('/signin',[App\Http\Controllers\api\account\AccountController::class, 'signIn'])->name('signIn');
Route::post('/login',[App\Http\Controllers\api\account\AccountController::class, 'login'])->name('logIn');

