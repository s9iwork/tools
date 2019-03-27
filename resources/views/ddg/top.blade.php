@extends('layouts.app')

@section('title', 'ダミーデータ作成ツール')

@section('content')
	<main class="container">
		<form action="">
			<div class="row">
				<div class="col s12">
					<ul class="tabs z-depth-1">
						<li class="tab col s3">
							<a href="#category1">アイパス系</a>
						</li>
						<li class="tab col s3">
							<a href="#category2">個人情報系</a>
						</li>
						<li class="tab col s3">
							<a href="#category3">クレカ系</a>
						</li>
						<li class="tab col s3">
							<a href="#category4">地図系</a>
						</li>
						<li class="tab col s3">
							<a href="#category5">未分類</a>
						</li>
					</ul>
				</div>
				<div id="">
					<p>アイパス系</p>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>ID</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>パスワード</span>
						</label>
					</div>
				</div>
				<div id="">
					<p>個人情報系</p>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>郵便番号</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>住所</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>名前</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>電話番号</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>メールアドレス</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>国</span>
						</label>
					</div>
				</div>
				<div id="">
					<p>地図系</p>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>緯度</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>軽度</span>
						</label>
					</div>
				</div>
				<div id="">
					<p>未分類</p>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>軽度</span>
						</label>
					</div>
				</div>
			</div>
		</form>
	</main>
@endsection

@include('layouts.head')
@include('ddg.layouts.header')
@include('layouts.footer')
