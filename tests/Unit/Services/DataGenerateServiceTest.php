<?php

namespace Tests\Unit\Services;

use App\Services\DataGenerateService;
use App\Repositories\DataGenerateRepository;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

/**
 * Class DataGenerateServiceTest
 * @package Tests\Unit\Services
 * @group ddg
 */
class DataGenerateServiceTest extends TestCase
{
	/**
	 * @var string 日付フォーマット
	 */
	private const DATE_FORMAT = 'Y-m-d H:i:s';

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
		$mock = $this->mock(DataGenerateRepository::class, function ($mock) use ($mock_categories, $mock_data_types) {
			$mock->shouldReceive('getCategories')->with()->andReturn($mock_categories);
			$mock->shouldReceive('getDataTypes')->with()->andReturn($mock_data_types);
		});
		$this->app->instance(DataGenerateRepository::class, $mock);

		// テスト
		$service = $this->app->make(DataGenerateService::class);
		list($categories, $data_types) = $service->getInitialData();

		// データ確認
		$this->assertSame($mock_categories, $categories);
		$this->assertSame($mock_data_types, $data_types);
	}

	/**
	 * create：日付データ生成
	 */
	public function test_create_01()
	{
		// パラメータ
		$params = [
			'type' => 30
		];

		// テスト
		$service = $this->app->make(DataGenerateService::class);
		$created_items = $service->create($params);

		// データ確認
		$this->assertCount(10, $created_items);
		foreach ($created_items as $created_item) {
			$this->assertTrue($this->validateDateFormat($created_item, self::DATE_FORMAT));
		}
	}

	/**
	 * create：日付（直近1か月）データ生成
	 */
	public function test_create_02()
	{
		// パラメータ
		$params = [
			'type' => 29
		];

		// テスト
		$service = $this->app->make(DataGenerateService::class);
		$created_items = $service->create($params);

		// データ確認
		$this->assertCount(10, $created_items);
		foreach ($created_items as $created_item) {
			$this->assertTrue($this->validateDateFormat($created_item, self::DATE_FORMAT, 31));
		}
	}

	/**
	 * create：日付（直近1年）データ生成
	 */
	public function test_create_03()
	{
		// パラメータ
		$params = [
			'type' => 28
		];

		// テスト
		$service = $this->app->make(DataGenerateService::class);
		$created_items = $service->create($params);

		// データ確認
		$this->assertCount(10, $created_items);
		foreach ($created_items as $created_item) {
			$this->assertTrue($this->validateDateFormat($created_item, self::DATE_FORMAT, 365));
		}
	}

	/**
	 * create：住所データ生成（複数のデータから生成）
	 */
	public function test_create_04()
	{
		// パラメータ
		$params = [
			'type' => 3
		];

		// テスト
		$service = $this->app->make(DataGenerateService::class);
		$created_items = $service->create($params);

		// データ確認
		$this->assertCount(10, $created_items);
		foreach ($created_items as $created_item) {
			$this->assertIsString($created_item);
		}
	}

	/**
	 * create：クレジットカードデータ生成（カンマ区切りで生成）
	 */
	public function test_create_05()
	{
		// パラメータ
		$params = [
			'type' => 8
		];

		// テスト
		$service = $this->app->make(DataGenerateService::class);
		$created_items = $service->create($params);

		// データ確認
		$this->assertCount(10, $created_items);
		foreach ($created_items as $created_item) {
			$item_details = explode(',', $created_item);
			$this->assertTrue(count($item_details) > 0);
		}
	}

	/**
	 * 日付フォーマットをチェックする
	 *
	 * @param string   $date   日付文字列
	 * @param string   $format フォーマット
	 * @param int|null $within 日数
	 * @return bool フォーマットが一致しているかどうか
	 */
	private function validateDateFormat(string $date, string $format='Y-m-d H:i:s', ?int $within=null) :bool{
		$datetime = \DateTime::createFromFormat($format, $date);

		if($within === null)
			return $datetime && ($datetime->format($format) === $date);

		return (new \Datetime())->modify("-{$within} day") < $datetime;
	}
}
