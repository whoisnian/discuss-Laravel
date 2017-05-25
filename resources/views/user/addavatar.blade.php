@extends('layouts.master')

@section('title', 'Avatar')

@section('content')

<div class="form">
	<h1>Avatar</h1>

	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label>
	@else
		<label><span class="error">请选择小于2MB的jpg，png图片。</span></label>
    @endif
	<form action="/checkaddavatar" method="post" enctype="multipart/form-data">
		<input type="file" class="file" accept="image/png,image/jpeg,image/jpg" name="avatar">
		<br/>
		<br/>
		{{ csrf_field() }}
        <input type="submit" class="button" value="确认">
	</form>
	<br/>
</div>

@endsection