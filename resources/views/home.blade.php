@extends('layouts.master')

@section('title', 'Discuss')

@section('content')

<div class="card">
    @foreach($messages as $message)
        @if($message->anonymous == '1')
            <img src="/image/anonymous" class="card-avatar">
        @else
            <a href="/userinfo/{{ $message->userid }}"><img src="/avatar/{{ $message->userid }}" class="card-avatar"></a>
        @endif
        <table class="card-table">
            @if($message->anonymous == '0')
                <tr><td class="card-head-left"><a class="maxlen" href="/userinfo/{{ $message->userid }}">{{ $users->where('id', $message->userid)->first()->name }}</a><br/>发表于{{ $message->updated_at }}</td>
            @else
                <tr><td class="card-head-left">用户匿名<br/>发表于{{ $message->updated_at }}
                    @if(Session::get('privilege') == '2') 
                        <a href="/userinfo/{{ $message->userid }}">{{ $users->where('id', $message->userid)->first()->name }}</a>
                    @endif
                </td>
            @endif
            <td class="card-head-right">
                @if(Session::has('id'))
                    <a href="/addreply/{{ $message->id }}">回复</a>
                @endif
                @if((Session::get('id') == $message->userid&&Session::get('privilege') != '0') || Session::get('privilege') == '2')
                    <a href="/editmessage/{{ $message->id }}">修改</a>
                    <a href="/deletemessage/{{ $message->id }}">删除</a>
                @endif
            </td></tr>
            <tr><td colspan="2" class="card-body-big">{{ $message->content }}</td></tr>
        </table>
        @foreach($replys->where('messageid', $message->id) as $reply)
            @if($reply->anonymous == '1')
                <img src="/image/anonymous" class="card-avatar">
            @else
                <a href="/userinfo/{{ $reply->userid }}"><img src="/avatar/{{ $reply->userid }}" class="card-avatar"></a>
            @endif
            <table class="card-table">
                @if($reply->anonymous == '0')
                    <tr><td class="card-head-left"><a href="/userinfo/{{ $reply->userid }}">{{ $users->where('id', $reply->userid)->first()->name }}</a><br/>回复于{{ $reply->updated_at }}</td>
                @else
                    <tr><td class="card-head-left">用户匿名<br/>回复于{{ $reply->updated_at }}
                        @if(Session::get('privilege') == '2') 
                            <a href="/userinfo/{{ $reply->userid }}">{{ $users->where('id', $reply->userid)->first()->name }}</a>
                        @endif
                    </td>
                @endif
                <td class="card-head-right">
                    @if((Session::get('id') == $reply->userid&&Session::get('privilege') != '0') || Session::get('privilege') == '2')
                        <a href="/editreply/{{ $reply->id }}">修改</a>
                        <a href="/deletereply/{{ $reply->id }}">删除</a>
                    @endif
                </td></tr>
                <tr><td colspan="2" class="card-body-small">{{ $reply->content }}</td></tr>
            </table>
        @endforeach
        <br/><br/>
        <div class="line"></div>
    @endforeach
    <div style="text-align:center">Done</div>
</div>

@endsection