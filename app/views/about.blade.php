@extends('master')
@section('header')
	<h2>About this page!</h2>
@stop
@section('content')
	<p>There are over {{$number_of_cats}} cats on this site!</p>
	<p>Her's another variable passed from the routes to this view:</p>
	<p>Bugs: {{$bugs}}</p> 
@stop