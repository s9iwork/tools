<?php

use App\Ddg\Constants\CategoryConstant;
use App\Ddg\Models\DdgCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

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
