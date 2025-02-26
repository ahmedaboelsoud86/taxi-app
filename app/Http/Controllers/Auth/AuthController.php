<?php

namespace App\Http\Controllers\Auth;

use App\Events\SendEmailEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Events\NewUserCreated;
use Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Str;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->all();
        $errors = Validator::make($fields, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($errors->fails()) {
            return response($errors->errors()->all(), 422);
        }
        $user = User::getUserByEmail($fields['email']);

        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([ 'message' => 'user name or passoed not correct'], 401);
        }

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);

    }

    public function register(Request $request)
    {
        $fields = $request->all();
        $errors = Validator::make($fields, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:8',
        ]);

        if ($errors->fails()) {
            return response($errors->errors()->all(), 422);
        }
        $otp_code = User::generateOTP();
        $user = User::create([
            'name' => $fields['name'],
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
    public function vaildateUserEmail(Request $request)
    {
        $email = $request->email;
        $otp_code = $request->otp_code;
        $user = User::getUserByEmail($email);
        if (!is_null($user)) {
            if ($user->otp_code == $otp_code) {
                $user->where('email', $email)->update([
                    'is_vaild_email' => User::IS_VALID_EMAIL
                ]);
                return response([
                    'message' => 'Your email has been vailded ',
                    'user' => $user
                ], 200);
            } else {
                return response([
                    'message' => 'invaild code ',
                    'user' => $user
                ], 200);
            }
        } else {
            return response([
                'message' => 'user not fount ',
                'user' => $user
            ], 200);
        }
    }
}
