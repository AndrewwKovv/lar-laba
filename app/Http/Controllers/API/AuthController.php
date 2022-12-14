<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function create(){
        return view('auth/registration');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|min:6',
        ]);
        
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role_id' =>2,
        ]);

        $token = $user->createToken('myAppToken');
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function login(){
        return view('auth.singin');

    }
    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => request('email'),
            'password' => request('password'),
        ];
        if(Auth::attempt($credentials)){
            // $request->session()->regenerate();
            $token = auth()->user()->createToken('myAppToken');
            return response($token, 210);
        }
        return back()->withErrors([
            'email' => 'GAY'
        ]);
    }   
    public function logout(Request $request){
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect('/');
        auth()->user()->tokens()->delete();
        return response('User logout');

    }
}