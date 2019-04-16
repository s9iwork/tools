@extends('layouts.app')

@section('title', 'ユーティリティ君')
@section('favicon', '/img/util/favicon.png')
@section('description', '')
@section('keywords', '')

@section('content')
	<util-top></util-top>
@endsection

@include('layouts.head')
@include('util.layouts.header')
@include('layouts.footer')
