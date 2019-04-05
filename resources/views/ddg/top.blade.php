@extends('layouts.app')

@section('title', 'ダミーデータ作る君')
@section('favicon', '/img/ddg/favicon.png')

@section('content')
	<ddg-top></ddg-top>
@endsection

@include('layouts.head')
@include('ddg.layouts.header')
@include('layouts.footer')