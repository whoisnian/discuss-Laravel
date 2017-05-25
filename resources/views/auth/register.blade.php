@extends('layouts.master')

@section('title', 'Register')

@section('content')

<div class="form">
	<h1>Register</h1>

	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label>
	@else
		<br/>
    @endif
	<form action="/register" method="post">
	 	<label>昵称：</br>
			<input type="text" name="name" value="{{ old('name') }}" class="input"></label>
		<br/>
		<br/> 
		<label>邮箱：<br/>
			<input type="text" name="email" value="{{ old('email') }}" class="input"></label>
		<br/>
		<br/>
		<label>密码：<br/>
			<input type="password" name="password" class="input"></label>
		<br/>
		<br/>
		<label>确认密码：<br/>
			<input type="password" name="password_confirmation" class="input"></label>
		<br/>
		<br/>
		{{ csrf_field() }}
		<input type="submit" value="注册" class="button">
	</form>
	<br/>
</div>

@endsection