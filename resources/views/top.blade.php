@extends('layouts.app')

@section('title', 'Webツール')

@section('content')
	<main class="container">
		<div class="row">
			<div class="col s12 m6">
				<div class="card-wrapper">
					<div class="card">
						<div class="card-image">
							<img src="//placehold.jp/150x150.png">
							<span class="card-title">ダミーデータ作成ツール</span>
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
			<div class="col s12 m6">
				<div class="card-wrapper">
					<div class="card">
						<div class="card-image">
							<img src="//placehold.jp/150x150.png">
							<span class="card-title">FW速度比較</span>
						</div>
						<div class="card-content">
							<p>FW別の応答速度を比較するツールです。</p>
						</div>
						<div class="card-action">
							<a href="/pc">View</a>
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
