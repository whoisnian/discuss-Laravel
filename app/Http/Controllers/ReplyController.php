<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Reply;
use App\Http\Requests\ReplyRequest;

class ReplyController extends Controller
{
    public function addreply(Request $request, $message_id)
    {
        $input = $request->all();
        $data['message_id'] = $message_id;
        return View::make('reply.addreply')->with($data);
    }

    public function checkaddreply(ReplyRequest $request, $message_id)
    {
        $input = $request->all();
        $reply = new Reply;
        $reply->messageid = $message_id;
        $reply->userid = session('id');
        $reply->content = $input['content'];
        $reply->anonymous = $input['anonymous'];
        $reply->save();
        return Redirect::to('/');
    }

    public function editreply(Request $request, $reply_id)
    {
        $input = $request->all();
        $reply = Reply::find($reply_id);
        if((session('id') != $reply->userid && session('privilege') != '2') || session('privilege') == '0') 
            return View::make('error')->withErrors('用户无权限！');
        $data = [];
        $data['reply'] = Reply::find($reply_id);
        return View::make('reply.editreply')->with($data);
    }

    public function checkeditreply(ReplyRequest $request, $reply_id)
    {
        $input = $request->all();
        $reply = Reply::find($reply_id);
        $reply->content = $input['content'];
        $reply->anonymous = $input['anonymous'];
        $reply->update();
        return Redirect::to('/');
    }

    public function deletereply(Request $request, $reply_id)
    {
        $input = $request->all();
        $reply = Reply::find($reply_id);
        if((session('id') != $reply->userid && session('privilege') != '2') || session('privilege') == '0') 
            return View::make('error')->withErrors('用户无权限！');
        $reply->delete();
        return Redirect::to('/');
    }
}
