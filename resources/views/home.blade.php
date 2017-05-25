@extends('layouts.master')

@section('title', 'Discuss')

@section('content')

<div class="card">
    @foreach($messages as $message)
        <div class="card-message">
            @if($message->anonymous == '0')
                <a href="/userinfo/{{ $message->userid }}"><img src="/avatar/{{ $message->userid }}" width="50px" height="50px" align="top"></a>
            @else
                <img src="/anonymousavatar" width="50px" height="50px" align="top">
            @endif
            <table class="card-table">
                @if($message->anonymous == '0')
                    <tr><td class="card-head-left"><a href="/userinfo/{{ $message->userid }}">{{ $users->where('id', $message->userid)->first()->name }}</a> 发表于{{ $message->updated_at }}</td>
                @else
                    <tr><td class="card-head-left">用户匿名发表于{{ $message->updated_at }}
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
        </div>
        @foreach($replys->where('messageid', $message->id) as $reply)
            <div class="card-reply">
                @if($reply->anonymous == '0')
                    <a href="/userinfo/{{ $reply->userid }}"><img src="/avatar/{{ $reply->userid }}" width="50px" height="50px" align="top"></a>
                @else
                    <img src="/anonymousavatar" width="50px" height="50px" align="top">
                @endif
                <table class="card-table">
                    @if($reply->anonymous == '0')
                        <tr><td class="card-head-left"><a href="/userinfo/{{ $reply->userid }}">{{ $users->where('id', $reply->userid)->first()->name }}</a> 发表于{{ $reply->updated_at }}</td>
                    @else
                        <tr><td class="card-head-left">用户匿名发表于{{ $reply->updated_at }}
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
            </div>
        @endforeach
    {{-- <div style="border-style:ridge;border-color:#999999;border-width:1px 0;"></div> --}}
        <br/>
    @endforeach
</div>

@endsection