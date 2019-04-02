<?php

namespace App\Services;

use Faker\Factory;
use App\Repositories\DataGenerateRepository;

/**
 * Class DataGenerateServiceImpl
 * @package App\Services
 */
class DataGenerateServiceImpl implements DataGenerateService
{
//	/**
//	 * @var DataGenerateRepository
//	 */
//	protected $data_generate_repository = null;
//
//	/**
//	 * DataGenerateServiceImpl constructor.
//	 * @param DataGenerateRepository $data_generate_repository
//	 */
//	public function __construct(DataGenerateRepository $data_generate_repository)
//	{
//		$this->$data_generate_repository = $data_generate_repository;
//	}

	/**
	 * @return array
	 */
	public function create() :array
	{
		$faker = Factory::create('ja_JP');

		$response = [];
		for($i=0; $i < 10; $i++)
		{
			$response[] = $faker->name;
		}

		return $response;
	}
}
