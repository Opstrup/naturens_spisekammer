@extends('layouts.main')

@section('title')
	Error!
@stop
@section('head')
	<style>
		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.errorMsg {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
@stop
@section('body')
	<div class="errorMsg">

		<h1>Error!</h1>
		<p>Something went wrong</p>

	</div>
@stop