<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        return User::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> Hash::make($request->input('password')),
        ]);
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email', 'password'))){
            return response([
                'message'=>'invalid credentials',
            ],Response::HTTP_UNAUTHORIZED);
        }

        $user= Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60*24); // 1 day
        return response([
            'message'=>'success'
        ], Response::HTTP_OK)->withCookie($cookie);

    }

    public function user(){
        return Auth::user();
    }

    public function logout(Request $request){
        $cookie= Cookie::forget('jwt');
        return response([
            'message'=> 'success'
        ])->withCookie($cookie);
    }
}
