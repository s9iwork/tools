@extends('layouts.app')

@section('title', 'ダミーデータ作る君')

@section('content')
	<main class="container">
		<form action="">
			<div class="row">
				<div class="col s12">
					<ul class="tabs z-depth-1">
						<li class="tab col s3">
							<a href="#category-1">個人情報系</a>
						</li>
						<li class="tab col s3">
							<a href="#category-2">Web系</a>
						</li>
						<li class="tab col s3">
							<a href="#category-3">時間系</a>
						</li>
						<li class="tab col s3">
							<a href="#category-99">未分類</a>
						</li>
					</ul>
				</div>
				<div id="category-1">
					<p>個人情報系</p>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>国</span>
						</label>
					</div>
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
							<span>メールアドレス（存在しない）</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>会社名</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>銀行口座</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>クレジットカード種類</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>クレジットカード番号</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>クレジットカード有効期限</span>
						</label>
					</div>
				</div>
				<div id="category-2">
					<p>Web系</p>
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
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>ドメイン名</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>トップレベルドメイン（.comなど）</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>URL</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>IPV4アドレス</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>IPV6アドレス</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>UserAgent</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>UserAgent(Chrome)</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>UserAgent(Safari)</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>UserAgent(Opera)</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>UserAgent(IE)</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>UserAgent(IE)</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>MIMEタイプ</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>拡張子</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>16進数カラーコード</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>RGBカラー</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>カラー名</span>
						</label>
					</div>
				</div>
				<div id="category-3">
					<p>時間系</p>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>タイムゾーン</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>日付（今年）</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>日付（今月）</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>日付</span>
						</label>
					</div>
				</div>
				<div id="category-99">
					<p>未分類</p>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>フリーテキスト</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>国コード</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>国コード(3桁)</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>通貨コード</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>緯度</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>経度</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>ISBN-13(書籍コード)</span>
						</label>
					</div>
					<div>
						<label>
							<input class="with-gap" name="type" type="radio"/>
							<span>ISBN-10</span>
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
