<template>
	<main class="container">
		<div class="row">
			<div class="col s12">
				<h2 class="content__h2">
					このツールについて
				</h2>
				<div>
					Web開発で利用シーンが多いユーティリティをまとめています。
				</div>
			</div>
		</div>
		<div class="row tab-container">
			<div class="col s12">
				<ul class="tabs z-depth-1">
					<li class="tab col s3" v-on:click="changeTab">
						<a href="#string">文字列系</a>
					</li>
					<li class="tab col s3" v-on:click="changeTab">
						<a href="#file">ファイル系</a>
					</li>
					<li class="tab col s3" v-on:click="changeTab">
						<a href="#sv">CSV、TSV系</a>
					</li>
					<li class="tab col s3" v-on:click="changeTab">
						<a href="#image">画像系</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div id="string">
				<div class="col s12 m6">
					<h2 class="content__h2">文字列系</h2>
				</div>
			</div>
			<div id="file">
				<div class="col s12 m6">
					<h2 class="content__h2">ファイル系</h2>
				</div>
			</div>
			<div id="sv">
				<div class="col s12 m6">
					<h2 class="content__h2">CSV、TSV系</h2>
				</div>
			</div>
			<div id="image">
				<div class="col s12 m6">
					<h2 class="content__h2">画像系</h2>
				</div>
			</div>
		</div>
	</main>
</template>

<script>
	export default {
		data() {
			return {}
		},
		mounted() {
			document.addEventListener('DOMContentLoaded', function () {
				M.Tabs.init(document.querySelectorAll('.tabs'), {});
			});
		},
		methods: {
			changeTab(event) {},
		}
	}
</script>
