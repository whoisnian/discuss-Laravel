@extends('layouts.master')

@section('title', 'Edit Message')

@section('content')

<div class="card">
	<h1>Edit Message</h1>

	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label>
	@else
		<br/>
    @endif
	<form action="/checkeditmessage/{{ $message->id }}" method="post">
		<label>标题：<br/>
			<input type="text" name="title" value="{{ count($errors) ? old('title') : $message->title }}" class="input"></label>
		<br/>
		<br/>
		<label>内容：<br/>
			<textarea name="content" class="text">{{ count($errors) ? old('content') : $message->content }}</textarea></label>
		<br/>
		<br/>
		@if(Session::get('id')!=2)
		匿名：<input id="anonymous-yes" class="radio-input" type="radio" name="anonymous" value="1" 
				@if(($message->anonymous == '1'&&!count($errors))||(old('anonymous') == '1'&&count($errors))) checked @endif>
				<label for="anonymous-yes" class="radio-label">是</label>
			 <input id="anonymous-no" class="radio-input" type="radio" name="anonymous" value="0" 
			 	@if(($message->anonymous == '0'&&!count($errors))||(old('anonymous') == '0'&&count($errors))) checked @endif>
			 	<label for="anonymous-no" class="radio-label">否</label>
			 <br/>
			 <br/>
		@else
			<input type="hidden" name="anonymous" value="0">
		@endif
		{{ csrf_field() }}
		<input type="submit" value="修改" class="button">
	</form>
	<br/>
</div>
@endsection