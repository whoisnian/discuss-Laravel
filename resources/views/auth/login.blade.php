@extends('layouts.master')

@section('title', 'Login')

@section('content')

	<form action="/login" method="post" class="form-card">

		@if(count($errors) > 0)
			<label><span class="error">{!! $errors->first() !!}</span></label><br/>
		@else
			<br/>
    	@endif

		<label>邮箱：<br/>
			<input type="text" name="email" value="{{ old('email') }}" class="input"></label>
		<br/><br/>
		<label>密码：<br/>
			<input type="password" name="password" class="input"></label>
		<br/><br/>
		{{ csrf_field() }}
		<label class="button">登录<input style="display:none" type="submit" name="submit"></label>
	</form>

@endsection