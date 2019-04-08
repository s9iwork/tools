<template>
	<main class="container">
		<div class="row">
			<div class="col s12">
				<h2 class="content__h2">
					このツールについて
				</h2>
				<div>
					指定した種別のダミーデータを10件作成します。
				</div>
			</div>
		</div>
		<div class="row tab-container">
			<div class="col s12">
				<ul class="tabs z-depth-1">
					<li v-for="category in categories" class="tab col s3">
						<a v-bind:href="'#category-' + category.id">{{ category.name }}</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div v-for="category in categories" v-bind:id="'category-' + category.id">
				<div class="col s12 m6">
					<h2 class="content__h2">{{ category.name }}</h2>
					<div v-for="type in types[category.id]">
						<label>
							<input class="with-gap"
								   type="radio"
								   name="type"
								   v-bind:value="type.id"
								   v-model="createType" />
							<span>{{ type.name }}</span>
						</label>
					</div>
				</div>
				<div class="col s12 m6">
					<h2 class="content__h2">
						サンプル
					</h2>
					<div>
						{{ samples[createType] }}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 center-align">
				<button class="btn waves-effect waves-light" v-on:click="create">作成</button>
			</div>
		</div>
		<div class="row" v-if="isLoading">
			<div class="col s12 center-align">
				<loader></loader>
			</div>
		</div>
		<div class="row" v-if="createdItems.length > 0">
			<div class="col s12">
				<h2 class="content__h2">結果</h2>
				<div v-for="item in createdItems">
					{{ item }}
				</div>
			</div>
		</div>
	</main>
</template>

<script>
	export default {
		data() {
			return {
				isLoading: false,
				createType: 1,
				categories: [
					{
						id: 1,
						name: '個人情報系'
					},
					{
						id: 2,
						name: 'Web系'
					},
					{
						id: 3,
						name: '時間系'
					},
					{
						id: 4,
						name: '未分類'
					},
				],
				types: {
					1: [
						// 個人情報系
						{
							id: 1,
							name: '国',
							categoryId: 1,
						},
						{
							id: 2,
							name: '郵便番号',
							categoryId: 1,
						},
						{
							id: 3,
							name: '住所',
							categoryId: 1,
						},
						{
							id: 4,
							name: '名前',
							categoryId: 1,
						},
						{
							id: 5,
							name: '電話番号',
							categoryId: 1,
						},
						{
							id: 6,
							name: 'メールアドレス（ダミー）',
							categoryId: 1,
						},
						{
							id: 7,
							name: '会社名',
							categoryId: 1,
						},
						{
							id: 11,
							name: 'クレジットカード',
							categoryId: 1,
						}
					],
					2: [
						// Web系
						{
							id: 12,
							name: 'ID',
							categoryId: 2,
						},
						{
							id: 13,
							name: 'パスワード',
							categoryId: 2,
						},
						{
							id: 14,
							name: 'ドメイン名',
							categoryId: 2,
						},
						{
							id: 15,
							name: 'トップレベルドメイン',
							categoryId: 2,
						},
						{
							id: 16,
							name: 'URL',
							categoryId: 2,
						},
						{
							id: 17,
							name: 'IPV4アドレス',
							categoryId: 2,
						},
						{
							id: 18,
							name: 'IPV6アドレス',
							categoryId: 2,
						},
						{
							id: 19,
							name: 'UserAgent',
							categoryId: 2,
						},
						{
							id: 20,
							name: 'UserAgent(Chrome)',
							categoryId: 2,
						},
						{
							id: 21,
							name: 'UserAgent(Safari)',
							categoryId: 2,
						},
						{
							id: 22,
							name: 'UserAgent(Opera)',
							categoryId: 2,
						},
						{
							id: 23,
							name: 'UserAgent(IE)',
							categoryId: 2,
						},
						{
							id: 24,
							name: 'MIMEタイプ',
							categoryId: 2,
						},
						{
							id: 25,
							name: '拡張子',
							categoryId: 2,
						},
						{
							id: 26,
							name: '16進数カラーコード',
							categoryId: 2,
						},
						{
							id: 27,
							name: 'RGBカラー',
							categoryId: 2,
						},
						{
							id: 28,
							name: 'カラー名',
							categoryId: 2,
						}
					],
					3: [
						// 日付系
						{
							id: 29,
							name: 'タイムゾーン',
							categoryId: 3,
						},
						{
							id: 30,
							name: '日付（直近1年）',
							categoryId: 3,
						},
						{
							id: 31,
							name: '日付（直近1か月）',
							categoryId: 3,
						},
						{
							id: 32,
							name: '日付',
							categoryId: 3,
						}],
					4: [
						// 未分類
						{
							id: 33,
							name: 'フリーテキスト',
							categoryId: 4,
						},
						{
							id: 34,
							name: '国コード',
							categoryId: 4,
						},
						{
							id: 35,
							name: '国コード(3桁)',
							categoryId: 4,
						},
						{
							id: 36,
							name: '通貨コード',
							categoryId: 4,
						},
						{
							id: 37,
							name: '緯度',
							categoryId: 4,
						},
						{
							id: 38,
							name: '経度',
							categoryId: 4,
						},
						{
							id: 39,
							name: 'ISBN-13(書籍コード)',
							categoryId: 4,
						},
						{
							id: 40,
							name: 'ISBN-10',
							categoryId: 4,
						},
					]
				},
				samples: {
					1: 'イギリス',
					2: '6185699',
					3: '福島県西之園市宮沢町山本4-2-2',
					4: '小林 修平',
					5: '080-8209-9842',
					6: 'shuhei49@example.org',
					7: '株式会社 佐々木',
					11: 'Visa,4024007140008755,宮沢 裕太,08/19',
					12: 'minoru83',
					13: '1cwZYDEPHp',
					14: 'yamagishi.net',
					15: 'com',
					16: 'https://www.takahashi.biz/sint-id-at-provident-et-qui\n',
					17: '113.193.77.56',
					18: '2342:6b4c:ef9d:b54f:67d3:e738:6866:aecb',
					19: 'Mozilla/5.0 (compatible; MSIE 11.0; Windows NT 5.0; Trident/5.0)',
					20: 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5331 (KHTML, like Gecko) Chrome/37.0.817.0 Mobile Safari/5331',
					21: 'Mozilla/5.0 (Windows; U; Windows NT 5.1) AppleWebKit/535.2.4 (KHTML, like Gecko) Version/5.0.5 Safari/535.2.4',
					22: 'Opera/8.22 (Windows NT 6.1; sl-SI) Presto/2.9.170 Version/12.00',
					23: 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 4.0; Trident/5.0)',
					24: 'application/pkixcmp',
					25: 'bmp',
					26: '#b1d513',
					27: '155,200,242',
					28: 'Pink',
					29: 'Asia/Manila',
					30: '2018-05-27 12:10:15',
					31: '2019-03-30 01:05:55',
					32: '1999-01-15 23:38:32',
					33: 'Architecto nostrum explicabo rerum. Numquam enim qui animi quis nisi.',
					34: 'US',
					35: 'BRA',
					36: 'JPY',
					37: '67.497947',
					38: '74.066367',
					39: '9791765867397',
					40: '147131121X',
				},
				createdItems: []
			}
		},
		mounted() {
			document.addEventListener('DOMContentLoaded', function () {
				M.Tabs.init(document.querySelectorAll('.tabs'), {});
			});
		},
		methods: {
			create() {
				this.createdItems = [];
				this.isLoading = true;
				axios.get('/api/create', {
					params: {
						type: this.createType
					}
				}).then(res => {
					console.log(res.data.items);
					this.createdItems = res.data.items;
				}).catch(error => {
					alert('エラーが発生しました');
					console.log(error);
				}).finally(() => {
					this.isLoading = false;
				});
			},
		}
	}
</script>
