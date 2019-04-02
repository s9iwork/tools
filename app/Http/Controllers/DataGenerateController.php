<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DataGenerateService;

/**
 * Class DataGenerateController
 * @package App\Http\Controllers
 */
class DataGenerateController extends Controller
{
	protected $data_generate_service = null;

	public function __construct(DataGenerateService $data_generate_service)
	{
		$this->data_generate_service = $data_generate_service;
	}

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

		$response = $this->data_generate_service->create();

		return [
			'items' => $response
		];
	}
}
