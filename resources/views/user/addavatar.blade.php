@extends('layouts.master')

@section('title', 'Avatar')

@section('content')

<form action="/checkaddavatar" method="post" enctype="multipart/form-data" class="form-card">
	
	@if(count($errors) > 0)
		<label><span class="error">{!! $errors->first() !!}</span></label><br/>
	@else
		<label><span class="error">请选择小于2MB的jpg，png图片。</span></label><br/>
    @endif

	<input type="file" class="file" accept="image/png,image/jpeg,image/jpg" name="avatar">
	<br/><br/>
	{{ csrf_field() }}
	<label class="button">确认<input style="display:none" type="submit" name="submit"></label>
</form>

@endsection