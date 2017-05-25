@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div>
    @foreach($messages as $message)
        <table class="table">
            <tr>
                <td class="table-a"><a href="/userinfo/{{ $message->userid }}" alt="hello">{{ $users->where('id', $message->userid)->first()->name }}</a><br/>{{ $message->updated_at }}</td>
                <td class="table-b">{{ $message->title }}</td>
                <td class="table-c">
                    @if(Session::has('id'))
                        <a href="/addreply/{{ $message->id }}">回复</a>
                    @endif
                    @if(Session::get('id') == $message->userid)
                        <a href="/editmessage/{{ $message->id }}">修改</a>
                        <a href="/deletemessage/{{ $message->id }}">删除</a>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3" class="table-d">{{ $message->content }}</td>
            </tr>
        @foreach($replys->where('messageid', $message->id) as $reply)
            <tr>
                <td class="table-e"><a href="/userinfo/{{ $reply->userid }}">{{ $users->where('id', $reply->userid)->first()->name }}</a><br/>{{ $reply->updated_at }}</td>
                <td class="table-f">{{ $reply->content }}</td>
                <td class="table-e">
                    @if(Session::get('id') == $reply->userid)
                        <a href="/editreply/{{ $reply->id }}">修改</a>
                        <a href="/deletereply/{{ $reply->id }}">删除</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </table>
    <br/>
    @endforeach
</div>

@endsection