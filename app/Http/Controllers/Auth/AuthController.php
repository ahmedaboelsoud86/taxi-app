<?php

namespace App\Http\Controllers\Auth;

use App\Events\SendEmailEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Events\NewUserCreated;

use Str;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->all();
        $errors = Validator::make($fields, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:8',
        ]);

        if ($errors->fails()) {
            return response($errors->errors()->all(), 422);
        }
        $otp_code = User::generateOTP();
        $user = User::create([
            'name'  => $fields['name'],
            'email' => $fields['email'],
            'otp_code' => $otp_code,
            'password' => bcrypt($fields['password']),
            'isValidEmail' => User::IS_INVALID_EMAIL,
            'remember_token' => $this->generateRandomCode()
        ]);

       // NewUserCreated::dispatch($user);
        SendEmailEvent::dispatch($user);
        return response(['user' => $user, 'message' => 'user created'], 200);

    }
    function generateRandomCode()
    {
        $code = Str::random(10) . time();
        return $code;
    }
}
