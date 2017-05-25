<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\AvatarRequest;
use Illuminate\Http\File;

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

    public function getavatar(Request $request, $user_id){
        if (!Storage::exists('avatars/' . sha1($user_id)) && $user_id != '2')
            $avatar = Storage::get('public/noavatar');
        else if($user_id == '2')
            $avatar = Storage::get('public/guest');
        else
            $avatar = Storage::get('avatars/'.sha1($user_id));
        return $avatar;
    }

    public function getanonymousavatar(){
            $avatar = Storage::get('public/anonymous');
        return $avatar;
    }

    public function addavatar(){
        if(session('privilege') == '0') 
            return View::make('error')->withErrors('用户无权限！');
        return view('user.addavatar');
    }

    public function checkaddavatar(AvatarRequest $request){
        $input = $request->all();
        if ($request->hasFile('avatar'))
            Storage::putFileAs('/avatars', $request->file('avatar'), sha1(session('id')));
        return Redirect::to('/userinfo/'.session('id'));
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
