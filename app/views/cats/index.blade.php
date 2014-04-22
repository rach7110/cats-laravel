@extends('master')
@section('content')
	@foreach($cats as $cat)
		<div class="cat">
			<strong>{{{$cat->name}}}</strong>
		</div>
	@endforeach
@stop
