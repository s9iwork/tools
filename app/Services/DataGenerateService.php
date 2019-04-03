<?php

namespace App\Services;

use Faker\Factory;
use App\Repositories\DataGenerateRepositoryInterface;

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
	 * DataGenerateService constructor.
	 * @param DataGenerateRepositoryInterface $data_generate_repository
	 */
	public function __construct(DataGenerateRepositoryInterface $data_generate_repository)
	{
		$this->data_generate_repository = $data_generate_repository;
	}

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
