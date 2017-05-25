<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function showregister()
    {
        if(session()->has('id'))
            return Redirect::to('/');
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $input = $request->all();
        $user = new User;
        $user->privilege = '1';
        $user->name = $input['name'];
        $user->password = Hash::make($input['password']);
        $user->email = $input['email'];
        $user->save();
        return Redirect::to('/login');
    }

    public function showlogin()
    {
        if(session()->has('id'))
            return Redirect::to('/');
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $input = $request->all();
        $user = User::where('email', $input['email'])->first();
        if($user != NULL&&Hash::check($input['password'], $user->password))
        {
            if (Hash::needsRehash($user->password))
            {
                $user->password = Hash::make($request->password);
                $user->save();
            }
            $request->session()->put('id', $user->id);
            $request->session()->put('name', $user->name);
            $request->session()->put('privilege', $user->privilege);
            return Redirect::to('/');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors('邮箱或密码错误！');
        }
    }

    public function anonymous(Request $request)
    {
        $request->session()->put('id', '2');
        $request->session()->put('name', 'guest');
        $request->session()->put('privilege', '0');
        return Redirect::to('/');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('id');
        $request->session()->forget('name');
        $request->session()->forget('privilege');
        return Redirect::to('/');
    }
}
