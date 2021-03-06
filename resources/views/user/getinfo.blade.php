@extends('layouts.master')

@section('title', 'Info')

@section('content')

<div style="text-align:center">
	<h1>ID: {{ $user->id }}</h1>
	<img src="/avatar/{{ $user->id }}" width="100px" height="100px"><br/>
	@if($user->id == session('id')&&session('privilege') != '0')
		<a style="color:#666666" href="/addavatar">修改头像</a>
	@endif
	<br/>
	<table class="infobox">
		<tr>
			<td>用户昵称：</td>
			<td>{{ $user->name }}</td>
		</tr>
		<tr>
			<td>用户邮箱：</td>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<td>注册时间：</td>
			<td>{{ $user->created_at }}</td>
		</tr>
	</table>
	<br/>
	<label class="button">返回上一页<input style="display:none" onclick="window.history.back(-1);" type="submit" name="submit"></label>
</div>

@endsection