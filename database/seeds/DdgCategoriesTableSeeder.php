<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\DdgCategory;
use App\Constants\CategoryConstant;

class DdgCategoriesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DdgCategory::create([
			'id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'name' => '個人情報系',
		]);

		DdgCategory::create([
			'id' => CategoryConstant::CATEGORY_WEB,
			'name' => 'Web系',
		]);

		DdgCategory::create([
			'id' => CategoryConstant::CATEGORY_TIME,
			'name' => '時間系',
		]);

		DdgCategory::create([
			'id' => CategoryConstant::CATEGORY_OTHER,
			'name' => '未分類',
		]);
	}
}
