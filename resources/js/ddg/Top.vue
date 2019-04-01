<template>
	<main class="container">
		<div class="row">
			<div class="col s12">
				<h2 class="content__h2">
					このツールについて
				</h2>
				<div>
					指定した種別のダミーデータを50件作成します。
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
							id: 8,
							name: '銀行口座',
							categoryId: 1,
						},
						{
							id: 9,
							name: 'クレジットカード種類',
							categoryId: 1,
						},
						{
							id: 10,
							name: 'クレジットカード番号',
							categoryId: 1,
						},
						{
							id: 11,
							name: 'クレジットカード有効期限',
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
							name: '日付（今年）',
							categoryId: 3,
						},
						{
							id: 31,
							name: '日付（今月）',
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
					1: '1',
					2: '2',
					3: '3',
					4: '小林 修平',
					5: '5',
					6: '6',
					7: '7',
					8: '8',
					9: '9',
					10: '10',
					11: '11',
					12: '12',
					13: '13',
					14: '14',
					15: '15',
					16: '16',
					17: '17',
					18: '18',
					19: '19',
					20: '20',
					21: '21',
					22: '22',
					23: '23',
					24: '24',
					25: '25',
					26: '26',
					27: '27',
					28: '28',
					29: '29',
					30: '30',
					31: '31',
					32: '32',
					33: '33',
					34: '34',
					35: '35',
					36: '36',
					37: '37',
					38: '38',
					39: '39',
					40: '40',
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
