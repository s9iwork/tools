<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\DataGenerateController;
use App\Services\DataGenerateService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

/**
 * Class DataGenerateControllerTest
 * @package Tests\Unit\Controllers
 * @group ddg
 */
class DataGenerateControllerTest extends TestCase
{
	/**
	 * index：正常系
	 */
	public function test_index_01()
	{
		// モックの設定

		// テスト
		$controller = $this->app->make(DataGenerateController::class);
		$response = $controller->index();

		// データ確認
		$this->assertNotNull($response);
	}

	/**
	 * getInitialData：正常系
	 */
	public function test_getInitialData_01()
	{
		// モックの設定
		$mock_categories = [
			[
				'id' => 1,
				'name' => 'hoge',
			]
		];
		$mock_data_types = [
			[
				'id' => 1,
				'category_id' => 1,
				'name' => 'fuga',
			]
		];
		$mock = $this->mock(DataGenerateService::class, function ($mock) use ($mock_categories, $mock_data_types) {
			$mock->shouldReceive('getInitialData')->with()->andReturn([$mock_categories, $mock_data_types]);
		});
		$this->app->instance(DataGenerateService::class, $mock);

		// テスト
		$controller = $this->app->make(DataGenerateController::class);
		$response = $controller->getInitialData();

		// データ確認
		$this->assertSame(['categories' => $mock_categories, 'data_types' => $mock_data_types], $response);
	}

	/**
	 * create：種別が下限
	 */
	public function test_create_01()
	{
		// リクエストの設定
		$params = ['type' => 1];

		// モックの設定
		$mock_items = ['ほげほげ', 'ふがふが'];
		$mock = $this->mock(DataGenerateService::class, function ($mock) use ($params, $mock_items) {
			$mock->shouldReceive('create')->with($params)->andReturn($mock_items);
		});
		$this->app->instance(DataGenerateService::class, $mock);

		// テスト
		$request = new Request();
		$request->merge($params);
		$controller = $this->app->make(DataGenerateController::class);
		$response = $controller->create($request);

		// データ確認
		$this->assertSame(['items' => $mock_items], $response);
	}

	/**
	 * create：種別が上限
	 */
	public function test_create_02()
	{
		// リクエストの設定
		$params = ['type' => 40];

		// モックの設定
		$mock_items = ['ほげほげ', 'ふがふが'];
		$mock = $this->mock(DataGenerateService::class, function ($mock) use ($params, $mock_items) {
			$mock->shouldReceive('create')->with($params)->andReturn($mock_items);
		});
		$this->app->instance(DataGenerateService::class, $mock);

		// テスト
		$request = new Request();
		$request->merge($params);
		$controller = $this->app->make(DataGenerateController::class);
		$response = $controller->create($request);

		// データ確認
		$this->assertSame(['items' => $mock_items], $response);
	}

	/**
	 * create：データ種別がない
	 */
	public function test_create_03()
	{
		// リクエストの設定
		$params = [];

		// モックの設定
		$mock_items = ['ほげほげ', 'ふがふが'];
		$mock = $this->mock(DataGenerateService::class, function ($mock) use ($params, $mock_items) {
			$mock->shouldReceive('create')->with($params)->andReturn($mock_items);
		});
		$this->app->instance(DataGenerateService::class, $mock);

		// テスト
		$request = new Request();
		$controller = $this->app->make(DataGenerateController::class);
		try {
			$controller->create($request);
		} catch (\Exception $e) {
		}

		// データ確認
		$this->assertInstanceOf(ValidationException::class, $e);
	}

	/**
	 * create：データ種別が数値以外
	 */
	public function test_create_04()
	{
		// リクエストの設定
		$params = ['type' => 'hoge'];

		// モックの設定
		$mock_items = ['ほげほげ', 'ふがふが'];
		$mock = $this->mock(DataGenerateService::class, function ($mock) use ($params, $mock_items) {
			$mock->shouldReceive('create')->with($params)->andReturn($mock_items);
		});
		$this->app->instance(DataGenerateService::class, $mock);

		// テスト
		$request = new Request();
		$request->merge($params);
		$controller = $this->app->make(DataGenerateController::class);
		try {
			$controller->create($request);
		} catch (\Exception $e) {
		}

		// データ確認
		$this->assertInstanceOf(ValidationException::class, $e);
	}

	/**
	 * create：種別が下限-1
	 */
	public function test_create_05()
	{
		// リクエストの設定
		$params = ['type' => 0];

		// モックの設定
		$mock_items = ['ほげほげ', 'ふがふが'];
		$mock = $this->mock(DataGenerateService::class, function ($mock) use ($params, $mock_items) {
			$mock->shouldReceive('create')->with($params)->andReturn($mock_items);
		});
		$this->app->instance(DataGenerateService::class, $mock);

		// テスト
		$request = new Request();
		$request->merge($params);
		$controller = $this->app->make(DataGenerateController::class);
		try {
			$controller->create($request);
		} catch (\Exception $e) {
		}

		// データ確認
		$this->assertInstanceOf(ValidationException::class, $e);
	}

	/**
	 * create：種別が上限+1
	 */
	public function test_create_06()
	{
		// リクエストの設定
		$params = ['type' => 41];

		// モックの設定
		$mock_items = ['ほげほげ', 'ふがふが'];
		$mock = $this->mock(DataGenerateService::class, function ($mock) use ($params, $mock_items) {
			$mock->shouldReceive('create')->with($params)->andReturn($mock_items);
		});
		$this->app->instance(DataGenerateService::class, $mock);

		// テスト
		$request = new Request();
		$request->merge($params);
		$controller = $this->app->make(DataGenerateController::class);
		try {
			$controller->create($request);
		} catch (\Exception $e) {
		}

		// データ確認
		$this->assertInstanceOf(ValidationException::class, $e);
	}
}
