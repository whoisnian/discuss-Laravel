@extends('layouts.master')

@section('title', 'Register')

@section('content')


<form action="/register" method="post" class="form-card">
	
	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label><br/>
	@else
		<br/>
    @endif

	<label>昵称：<br/>
		<input type="text" name="name" value="{{ old('name') }}" class="input"></label>
	<br/><br/> 
	<label>邮箱：<br/>
		<input type="text" name="email" value="{{ old('email') }}" class="input"></label>
	<br/><br/>
	<label>密码：<br/>
		<input type="password" name="password" class="input"></label>
	<br/><br/>
	<label>确认密码：<br/>
		<input type="password" name="password_confirmation" class="input"></label>
	<br/><br/>
	{{ csrf_field() }}
	<label class="button">注册<input style="display:none" type="submit" name="submit"></label>
</form>

@endsection