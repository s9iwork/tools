@extends('layouts.app')

@section('title', 'ダミーデータ作る君')

@section('content')
	<main class="container">
		<ddg-top></ddg-top>
	</main>
@endsection

@include('layouts.head')
@include('ddg.layouts.header')
@include('layouts.footer')