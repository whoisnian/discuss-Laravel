@extends('layouts.master')

@section('title', 'Info')

@section('content')

<div>
	<h1>ID: {{ $user->id }}</h1>
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
</div>

@endsection