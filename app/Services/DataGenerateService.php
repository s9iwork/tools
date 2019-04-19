<?php

namespace App\Services;

use Faker\Factory;
use App\Repositories\DataGenerateRepositoryInterface;
use App\Constants\DatatypeConstant;

/**
 * Class DataGenerateService
 * @package App\Services
 */
class DataGenerateService implements DataGenerateServiceInterface
{
	/**
	 * @var DataGenerateRepositoryInterface
	 */
	protected $data_generate_repository;

	/**
	 * @var array データ種別と生成関数のマップ
	 */
	private const TYPE_METHOD_MAP = [
		DatatypeConstant::COUNTRY_NAME => 'country',
		DatatypeConstant::ZIP_CODE => 'postcode',
		DatatypeConstant::ADDRESS => [
			'prefecture',
			'city',
			'streetAddress'
		],
		DatatypeConstant::NAME => 'name',
		DatatypeConstant::TEL => 'phoneNumber',
		DatatypeConstant::EMAIL => 'safeEmail',
		DatatypeConstant::COMPANY_NAME => 'company',
		DatatypeConstant::CREDIT_CARD => 'creditCardDetails',
		DatatypeConstant::ID => 'userName',
		DatatypeConstant::PASSWORD => 'password',
		DatatypeConstant::DOMAIN => 'domainName',
		DatatypeConstant::TOP_DOMAIN => 'tld',
		DatatypeConstant::URL => 'url',
		DatatypeConstant::IPV4 => 'IPv4',
		DatatypeConstant::IPV6 => 'IPv6',
		DatatypeConstant::USER_AGENT => 'userAgent',
		DatatypeConstant::USER_AGENT_CHROME => 'chrome',
		DatatypeConstant::USER_AGENT_SAFARI => 'Safari',
		DatatypeConstant::USER_AGENT_OPERA => 'opera',
		DatatypeConstant::USER_AGENT_IE => 'internetExplorer',
		DatatypeConstant::MIME_TYPE => 'mimeType',
		DatatypeConstant::EXTENSION => 'fileExtension',
		DatatypeConstant::HEX_COLOR_CODE => 'hexColor',
		DatatypeConstant::RGB_COLOR_CODE => 'rgbColor',
		DatatypeConstant::COLOR_NAME => 'colorName',
		DatatypeConstant::TIME_ZONE => 'timezone',
		DatatypeConstant::DATE_CURRENT_YEAR => 'dateTimeThisYear',
		DatatypeConstant::DATE_CURRENT_MONTH => 'dateTimeThisMonth',
		DatatypeConstant::DATE => 'dateTimeThisCentury',
		DatatypeConstant::TEXT => 'text',
		DatatypeConstant::COUNTRY_CODE => 'countryCode',
		DatatypeConstant::COUNTRY_CODE_3DIGIT => 'countryISOAlpha3',
		DatatypeConstant::CURRENCY_CODE => 'currencyCode',
		DatatypeConstant::LATITUDE => 'latitude',
		DatatypeConstant::LONGITUDE => 'longitude',
		DatatypeConstant::ISBN13 => 'isbn13',
		DatatypeConstant::ISBN10 => 'isbn10'
	];

	/**
	 * @var int データ作成数
	 */
	private const GENERATE_NUM = 10;

	/**
	 * DataGenerateService constructor.
	 * @param DataGenerateRepositoryInterface $data_generate_repository
	 */
	public function __construct(DataGenerateRepositoryInterface $data_generate_repository)
	{
		$this->data_generate_repository = $data_generate_repository;
	}


	/**
	 * @param array $params リクエストパラメータ
	 * @return array
	 */
	public function get_initial_data(): array
	{
		// TODO サンプル実装。リポジトリ経由でDBから取る
		$categories = [
			[
				'id'=> 1,
				'name'=> '個人情報系',
			],
			[
				'id'=> 2,
				'name'=> 'Web系',
			],
			[
				'id'=> 3,
				'name'=> '時間系',
			],
			[
				'id'=> 4,
				'name'=> '未分類',
			],
		];

		$data_types = [
			[
				'id'=> 1,
				'name' => '国',
				'category_id' => 1,
				'sample' => 'hogehoge',
			],
			[
				'id'=> 2,
				'name' => '郵便番号',
				'category_id' => 1,
				'sample' => 'hogehoge2',
			],
			[
				'id'=> 12,
				'name' => '国',
				'category_id' => 2,
				'sample' => 'hogehoge3',
			],
			[
				'id'=> 13,
				'name' => '郵便番号',
				'category_id' => 2,
				'sample' => 'hogehoge4',
			],
		];

		return [$categories, $data_types];
	}

	/**
	 * @param array $params リクエストパラメータ
	 * @return array
	 */
	public function create(array $params = []): array
	{
		$faker = Factory::create('ja_JP');

		$response = [];
		for ($i = 0; $i < self::GENERATE_NUM; $i++) {
			$method = self::TYPE_METHOD_MAP[$params['type']];

			if (in_array($params['type'], [
				DatatypeConstant::DATE,
				DatatypeConstant::DATE_CURRENT_MONTH,
				DatatypeConstant::DATE_CURRENT_YEAR
			])) {
				$data = $faker->$method()->format('Y-m-d H:i:s');
			} else {
				if (is_array($method)) {
					$data = '';
					foreach ($method as $inner_method) {
						$data .= $faker->$inner_method();
					}
				} else {
					$data = $faker->$method();
				}
			}

			// 配列であればvalueをカンマ区切りで返却する
			$response[] = is_array($data) ? implode(',', array_values($data)) : $data;
		}

		return $response;
	}
}
