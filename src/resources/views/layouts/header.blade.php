@section('header')
	<header>
		<nav>
			<div class="container">
				@if(url()->current() === env('APP_URL'))
					<h1 class="header__h1">
						<a href="/" class="brand-logo">Webツール</a>
					</h1>
				@else
					<a href="/" class="brand-logo">Webツール</a>
				@endif
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
				</ul>
			</div>
		</nav>
		<ul class="sidenav" id="mobile-demo">
			<li><a href="https://shinjiezumi.work/contact">お問い合わせ</a></li>
		</ul>
	</header>
@endsection