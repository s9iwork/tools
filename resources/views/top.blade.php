@extends('layouts.app')

@section('title', 'Webツール')
@section('favicon', '/img/favicon.png')
@section('description', 'システムエンジニア、プログラマー向けに様々な自作Webツールを提供しています。')
@section('keywords', 'Webツール')

@section('content')
	<main class="container">
		<div class="row">
			<div class="col s12 m6">
				<div class="card-wrapper">
					<div class="card">
						<div class="card-image">
							<img src="/img/ddg/main.svg">
							<span class="card-title">ダミーデータ作る君</span>
						</div>
						<div class="card-content">
							<p>名前や住所などのダミーデータを生成するツールです。</p>
						</div>
						<div class="card-action">
							<a href="/ddg">View</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection

@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
