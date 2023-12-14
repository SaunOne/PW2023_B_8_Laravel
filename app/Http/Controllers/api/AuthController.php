<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiTambahan;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $registrationData = $request->all();

        $validate = Validator::make($registrationData, [
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email:rfc,dns|unique:users',
            'no_telp' => 'required', 
            'alamat' => 'required',
            'type_pengguna' => 'required',
            'image_profile' => 'required'
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $registrationData['password'] = bcrypt($request->password);

        $str = Str::random(100);
        $registrationData['verify_key'] = $str;
        $user = User::create($registrationData);

        $details = [
            'username' => $request->username,
            'website' => 'Laundry Space',
            'datetime' => Carbon::now(),
            'url' => request()->getHttpHost() . '/register/verify/' . $str,
        ];

        Mail::to($request->email)->send(new MailSend($details));

        
        return response([
            'message' => 'Register Success',
            'user' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $loginData = $request->all();

        $validate = Validator::make($loginData, [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
        ]);
        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        if (!Auth::attempt($loginData)) {
            return response(['message' => 'Invalid email & password match'], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->accessToken;

        return response([
            'message' => 'Authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }
}
