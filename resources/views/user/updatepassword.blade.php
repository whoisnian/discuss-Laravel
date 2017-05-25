@extends('layouts.master')

@section('title', 'Update Password')

@section('content')

<div class="form">
	<h1>Update Password</h1>

	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label>
	@else
		<br/>
    @endif
	<form action="/checkupdatepassword" method="post">
		<label>原密码：<br/>
			<input type="password" name="oldpassword" class="input"></label>
		<br/>
		<br/>
		<label>新密码：<br/>
			<input type="password" name="password" class="input"></label>
		<br/>
		<br/>
		<label>确认密码：<br/>
			<input type="password" name="password_confirmation" class="input"></label>
		<br/>
		<br/>
		{{ csrf_field() }}
		<input type="submit" value="修改" class="button">
	</form>
	<br/>
</div>

@endsection