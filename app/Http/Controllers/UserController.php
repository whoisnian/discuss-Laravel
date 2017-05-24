<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests\PasswordRequest;

class UserController extends Controller
{
    public function getinfo(Request $request, $user_id)
    {
        $data = [];
        $data['user'] = User::find($user_id);
        if($data['user'] != NULL)
            return View::make('user.getinfo')->with($data);
        else
            return View::make('error')->withErrors('用户不存在！');
    }

    public function updatepassword()
    {
        if(session('privilege') == '0') 
            return View::make('error')->withErrors('用户无权限！');
        return view('user.updatepassword');
    }

    public function checkupdatepassword(PasswordRequest $request)
    {
        $input = $request->all();
        $user = User::where('id', session('id'))->first();
        if($user != NULL&&Hash::check($input['oldpassword'], $user->password))
        {
            $user->password = Hash::make($input['password']);
            $user->update();
            return Redirect::to('/logout');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors('原密码错误！');
        }
    }
}
