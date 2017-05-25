@extends('layouts.master')

@section('title', 'Add Message')

@section('content')

<div class="card">
	<h1>Add Message</h1>

	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label>
	@else
		<br/>
    @endif
	<form action="/checkaddmessage" method="post">
		<label>标题：<br/>
			<input type="text" name="title" value="{{ old('title') }}" class="input"></label>
		<br/>
		<br/>
		<label>内容：<br/>
			<textarea name="content" class="text">{{ old('content') }}</textarea></label>
		<br/>
		<br/>
		@if(Session::get('id')!=2)
		匿名：<input id="anonymous-yes" class="radio-input" type="radio" name="anonymous" value="1" {{ old('anonymous') == '1' ? "checked" : "" }}>
				<label for="anonymous-yes" class="radio-label">是</label>
			 <input id="anonymous-no" class="radio-input" type="radio" name="anonymous" value="0" {{ old('anonymous') == '0' ? "checked" : "" }}>
			 	<label for="anonymous-no" class="radio-label">否</label>
			 <br/>
			 <br/>
		@else
			<input type="hidden" name="anonymous" value="0">
		@endif
		{{ csrf_field() }}
		<input type="submit" value="发表" class="button">
	</form>
	<br/>
</div>
@endsection