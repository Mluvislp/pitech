<?php

namespace App\Http\Controllers\api\account;

use Exception;
use App\Utils\Messages;
use App\Models\LoginAccount;
use Illuminate\Http\Request;
use App\Models\RegisterAccount;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Account\LoginAccountRequest;
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
            ], 500);
        }catch (Exception $error) {
            Log::error($error);
            return response()->json($error);
        }
       
        
    }
    public function login(LoginAccountRequest $request){
        try{
            $input= $request->validated();
            $member = LoginAccount::Where('email', $input['email'])->get();
            if (is_null($member)) {
                return response()->json([
                    'message' => Messages::MSG_0008,
                ], 401);
            }else{
               $logined  = Hash::check($input['password'],$member[0]->password);
               if($logined == true){
                return response()->json([
                    'message' => Messages::MSG_0007,
                    'member' =>  $member,
                    ], 201);
               }else{
                    return response()->json([
                        'message' => Messages::MSG_0009,
                        ], 500);
               }
            }
           
        }catch (Exception $error) {
            Log::error($error);
            return response()->json($error);
        }  
    }
}
