@extends('layouts.master')

@section('title', 'Discuss')

@section('content')
    @foreach($messages as $message)
        <hr/>
        {{ $users->where('id', $message->userid)->first()->name }}
        {{ $message->title }}
        {{ $message->content }}
        {{ $message->updated_at }}
        @if(Session::has('id'))
        <form action="/addreply" method="post">
            <input type="hidden" name="messageid" value="{{ $message->id }}">
            {{ csrf_field() }}
            <input type="submit" value="回复">
        </form>
        @endif
        @if(Session::get('id') == $message->userid)
        <form action="/editmessage" method="post">
            <input type="hidden" name="messageid" value="{{ $message->id }}">
            {{ csrf_field() }}
            <input type="submit" value="修改">
        </form>
        <form action="/deletemessage" method="post">
            <input type="hidden" name="messageid" value="{{ $message->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" value="删除">
        </form>
        @endif
        @foreach($replys->where('messageid', $message->id) as $reply)
            {{ $users->where('id', $reply->userid)->first()->name }}
            {{ $reply->content }}
            {{ $reply->updated_at }}
            @if(Session::get('id') == $reply->userid)
            <form action="/editreply" method="post">
                <input type="hidden" name="replyid" value="{{ $reply->id }}">
                {{ csrf_field() }}
                <input type="submit" value="修改">
            </form>
            <form action="/deletereply" method="post">
                <input type="hidden" name="replyid" value="{{ $reply->id }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <input type="submit" value="删除">
            </form>
            @endif
        @endforeach
    @endforeach
    
@endsection