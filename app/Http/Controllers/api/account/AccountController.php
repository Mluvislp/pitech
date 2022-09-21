<?php

namespace App\Http\Controllers\api\account;

use Exception;
use App\Utils\Messages;
use Illuminate\Http\Request;
use App\Models\RegisterAccount;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Account\RegisterAccountRequest ;

class AccountController extends Controller
{
    public function signIn(RegisterAccountRequest $request){
        try{
            $role = 1 ;
            $status = 1 ;
            $validated = $request->validated();
            $validated['password'] = Hash::make($validated['password']);
            $member = RegisterAccount::insertGetId([
                'email' => $validated['email'], 
                'password' => $validated['password'], 
                'user_name' => $validated['user_name'], 
                'user_role' => $role, 
                'user_status' => $status, 
            ]);
            return response()->json([
                'message' => Messages::MSG_0007,
                'member' =>  $member,
            ], 201);
        }catch (Exception $error) {
            Log::error($error);
            return response()->json(['message' => Messages::MSG_0001], 500);
        }
       
        
    }
}
