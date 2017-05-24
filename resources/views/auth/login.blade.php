@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="card">
	<h1>Login</h1>

	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label>
	@else
		<br/>
    @endif
	<form action="/login" method="post">
		<label>邮箱：<br/>
			<input type="text" name="email" value="{{ old('email') }}" class="input"></label>
		<br/>
		<br/>
		<label>密码：<br/>
			<input type="password" name="password" class="input"></label>
		<br/>
		<br/>
		{{ csrf_field() }}
		<input type="submit" value="登录" class="button">
	</form>
	<br/>
</div>
@endsection