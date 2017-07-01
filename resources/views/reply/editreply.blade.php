@extends('layouts.master')

@section('title', 'Edit Reply')

@section('content')

<form action="/checkeditreply/{{ $reply->id }}" method="post" class="form-card">

	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label><br/>
	@else
		<br/>
    @endif

	<label>内容：<br/>
		<textarea name="content" class="text">{{ count($errors) ? old('content') : $reply->content }}</textarea></label>
	<br/><br/>
	@if(Session::get('id')!=2)
	匿名：<input id="anonymous-yes" class="radio-input" type="radio" name="anonymous" value="1" 
			@if(($reply->anonymous == '1'&&!count($errors))||(old('anonymous') == '1'&&count($errors))) checked @endif>
			<label for="anonymous-yes" class="radio-label">是</label>
			<input id="anonymous-no" class="radio-input" type="radio" name="anonymous" value="0" 
			@if(($reply->anonymous == '0'&&!count($errors))||(old('anonymous') == '0'&&count($errors))) checked @endif>
			<label for="anonymous-no" class="radio-label">否</label>
	<br/><br/>
	@else
		<input type="hidden" name="anonymous" value="0">
	@endif
	{{ csrf_field() }}
	<label class="button">修改<input style="display:none" type="submit" name="submit"></label>
</form>
@endsection