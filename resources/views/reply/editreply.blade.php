@extends('layouts.master')

@section('title', 'Edit')

@section('content')

<div>
	<form action="/checkeditreply" method="post">
		<label>内容：<textarea name="content">{{ $reply->content }}</textarea></label>
		@if(Session::get('id')!=2)
		匿名：<input type="radio" name="anonymous" value="1" {{ $reply->anonymous == '1' ? "checked" : ""}}>是
			 <input type="radio" name="anonymous" value="0" {{ $reply->anonymous == '0' ? "checked" : ""}}>否
		@else
			<input type="hidden" name="anonymous" value="0">
		@endif
		{{ csrf_field() }}
		<input type="hidden" name="replyid" value="{{ $reply->id }}">
		<input type="submit" value="发表">
	</form>
	@if(count($errors) > 0)
		<label>
			<span class="error">{!! $errors->first() !!}</span>
		</label>
    @endif
</div>
@endsection