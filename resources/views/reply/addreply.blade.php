@extends('layouts.master')

@section('title', 'Add')

@section('content')

<div>
	<form action="/checkaddreply" method="post">
		<label>内容：<textarea name="content">{{ old('content') }}</textarea></label>
		@if(Session::get('id')!=2)
		匿名：<input type="radio" name="anonymous" value="1" {{ old('anonymous') == '1' ? "checked" : ""}}>是
			 <input type="radio" name="anonymous" value="0" {{ old('anonymous') == '0' ? "checked" : ""}}>否
		@else
			<input type="hidden" name="anonymous" value="0">
		@endif
		<input type="hidden" name="messageid" value="{{ $messageid }}">
		{{ csrf_field() }}
		<input type="submit" value="发表">
	</form>
	@if(count($errors) > 0)
		<label>
			<span class="error">{!! $errors->first() !!}</span>
		</label>
    @endif
</div>
@endsection