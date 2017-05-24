@extends('layouts.master')

@section('title', 'Error')

@section('content')

<br/>
<br/>
<div>
	@if(count($errors) > 0)
		<label>
			<span class="error">{!! $errors->first() !!}</span>
		</label>
    @endif
</div>

@endsection
