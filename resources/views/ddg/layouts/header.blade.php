@section('header')
	<header>
		<nav>
			<div class="container">
				<h1 class="header__h1">
					<a href="/ddg" class="brand-logo header__title">ダミーデータ作る君</a>
				</h1>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="{{route('top')}}">ツール一覧</a></li>
					<li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
				</ul>
			</div>
		</nav>
		<ul class="sidenav" id="mobile-demo">
			<li><a href="{{route('top')}}">ツール一覧</a></li>
			<li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
		</ul>
	</header>
@endsection