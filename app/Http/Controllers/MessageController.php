<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Message;
use App\Reply;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function addmessage()
    {
        return view('message.addmessage');
    }

    public function checkaddmessage(MessageRequest $request)
    {
        $input = $request->all();
        $message = new Message;
        $message->userid = session('id');
        $message->title = $input['title'];
        $message->content = $input['content'];
        $message->anonymous = $input['anonymous'];
        $message->save();
        return Redirect::to('/');
    }

    public function showeditmessage(Request $request)
    {
        return View::make('message.editmessage');
    }

    public function editmessage(Request $request)
    {
        $input = $request->all();
        $message = Message::find($input['messageid']);
        if((session('id') != $message->userid && session('privilege') != '2') || session('privilege') == '0') 
            return View::make('error')->withErrors('用户无权限！');
        $data = [];
        $data['message'] = Message::find($input['messageid']);
        return View::make('message.editmessage')->with($data);
    }

    public function checkeditmessage(MessageRequest $request)
    {
        $input = $request->all();
        $message = Message::find($input['messageid']);
        $message->title = $input['title'];
        $message->content = $input['content'];
        $message->anonymous = $input['anonymous'];
        $message->update();
        return Redirect::to('/');
    }

    public function deletemessage(Request $request)
    {
        $input = $request->all();
        $message = Message::find($input['messageid']);
        if((session('id') != $message->userid && session('privilege') != '2') || session('privilege') == '0') 
            return View::make('error')->withErrors('用户无权限！');
        $message->delete();
        $deletereply = Reply::where('messageid', $input['messageid'])->delete();
        return Redirect::to('/');
    }
}
