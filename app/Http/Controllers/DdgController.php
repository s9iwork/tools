<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory;

/**
 * Class DdgController
 * @package App\Http\Controllers
 */
class DdgController extends Controller
{
	/**
	 * トップページを表示する
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('ddg/top');
	}

	/**
	 * ダミーデータを生成する
	 *
	 * @throws
	 * @return array
	 */
	public function create(Request $request)
	{
		// バリデーション
		$this->validate($request, [
			'type' => 'required|integer|min:1|max:4'
		]);

		$faker = Factory::create('ja_JP');
		$response = [];
		for($i=0; $i < 10; $i++)
		{
			$response[] = $faker->name;
		}

		return [
			'items' => $response
		];
	}
}
