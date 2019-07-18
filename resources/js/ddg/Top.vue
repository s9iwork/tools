<template>
	<main class="content container">
		<div class="row" v-if="!isInitialized">
			<div class="col s12 center-align initial-loader">
				<loader></loader>
			</div>
		</div>
		<div v-if="isInitialized">
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
						<li v-for="category in categories" class="tab col s3" v-on:click="changeTab">
							<a v-bind:href="'#category-' + category.id" v-bind:data-category-id="category.id">{{ category.name }}</a>
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
								<input class="with-gap type"
									   type="radio"
									   name="type"
									   v-bind:value="type.id"
									   v-model="selectedType"/>
								<span>{{ type.name }}</span>
							</label>
						</div>
					</div>
					<div class="col s12 m6">
						<h2 class="content__h2">
							サンプル
						</h2>
						<div>
							{{ samples[selectedType] }}
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
					<div class="created-item" v-for="item in createdItems">
						{{ item }}
					</div>
				</div>
				<div class="center-align">
					<button class="btn waves-effect waves-light" v-on:click="copy">コピー</button>
				</div>
			</div>
		</div>
	</main>
</template>

<script>
	export default {
		data() {
			return {
				isInitialized: false,
				isTabInitialized: false,
				isLoading: false,
				selectedType: 1,
				categories: [],
				types: [],
				samples: [],
				createdItems: []
			}
		},
		mounted() {
			this.loadInitialData();
		},
		updated() {
			if(!this.isTabInitialized) {
				M.Tabs.init(document.querySelectorAll('.tabs'), {});
				this.isTabInitialized = true;
			}
		},
		methods: {
			loadInitialData() {
				axios.get('/api/ddg/initial_data', {
					params: {}
				}).then(res => {
					this.categories = res.data.categories;

					// 種別とサンプルを整形する
					let types = [];
					let samples = {};
					res.data.data_types.forEach((val, index) => {
						if(types[val.category_id] === undefined)
							types[val.category_id] = [];
						types[val.category_id].push(val);

						samples[val.id] = val.sample;
					});
					this.types = types;
					this.samples = samples;
					this.isInitialized = true;

				}).catch(error => {
					alert('エラーが発生しました');
					console.log(error);
				});
			},
			create() {
				this.createdItems = [];
				this.isLoading = true;
				axios.get('/api/ddg/create', {
					params: {
						type: this.selectedType
					}
				}).then(res => {
					this.createdItems = res.data.items;
				}).catch(error => {
					alert('エラーが発生しました');
					console.log(error);
				}).finally(() => {
					this.isLoading = false;
				});
			},
			changeTab(event) {
				this.createdItems = [];

				let categoryId = event.target.getAttribute('data-category-id');
				let target = document.querySelector('#category-' + categoryId + ' .type');
				target.checked = true;
				this.selectedType = target.value;
			},
			copy() {
				let copyString = "";
				let createdItems = document.getElementsByClassName('created-item');
				for (let item of createdItems) {
					copyString += (item.innerText + "\n");
				}

				// クリップボードにコピー
				let temp = document.createElement('div');
				temp.appendChild(document.createElement('pre')).textContent = copyString;

				// 画面外に固定
				let style = temp.style;
				style.position = 'fixed';
				style.left = '-100%';
				document.body.appendChild(temp);
				document.getSelection().selectAllChildren(temp);

				let result = document.execCommand('copy');
				document.body.removeChild(temp);
				console.log(copyString);
				result ? M.toast({html: 'コピーしました'}) : M.toast({html: 'コピーに失敗しました。リロードしてお試しください'});
			}
		}
	}
</script>
