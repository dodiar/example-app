<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [           
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message', 'error'], 404);
        }

        $user = User::where(['email' => $request->email])->first();

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]))

        {
            $token = $user->createToken('api_token')->plainTextToken; 

            return response()->json(['token' => $token], 200);
        }
    }
}
