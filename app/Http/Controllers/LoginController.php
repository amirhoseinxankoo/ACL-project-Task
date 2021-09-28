<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function check(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back();
        }

        auth()->loginUsingId($user->id);
        // dd(auth()->user());
        Session::put('user',$user);
        
        return redirect()->route('user.index');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login-index');
    }
}
