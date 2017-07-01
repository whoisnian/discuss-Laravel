@extends('layouts.master')

@section('title', 'Update Password')

@section('content')

<form action="/checkupdatepassword" method="post" class="form-card">

	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label><br/>
	@else
		<br/>
    @endif

	<label>原密码：<br/>
		<input type="password" name="oldpassword" class="input"></label>
	<br/><br/>
	<label>新密码：<br/>
		<input type="password" name="password" class="input"></label>
	<br/><br/>
	<label>确认密码：<br/>
		<input type="password" name="password_confirmation" class="input"></label>
	<br/><br/>
	{{ csrf_field() }}
	<label class="button">修改<input style="display:none" type="submit" name="submit"></label>
</form>

@endsection