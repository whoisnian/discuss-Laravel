<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\User;
use App\Message;
use App\Reply;

class HomeController extends Controller
{
    public function home()
    {
        $data = [];
        $data['messages'] = Message::orderby('id', 'dsc')->get();
        $data['users'] = User::orderby('id', 'asc')->get();
        $data['replys'] = Reply::orderby('id', 'asc')->get();
        return View::make('home')->with($data);
    }
}
