<?php

namespace App\Repositories;

use App\DdgCategory;
use App\DdgDataType;

/**
 * Class DataGenerateRepository
 * @package App\Repositories
 */
class DataGenerateRepository implements DataGenerateRepositoryInterface
{
	/**
	 * DataGenerateRepository constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * {@inheritdoc}
	 */
	public function getCategories(): array
	{
		return DdgCategory::all()->toArray();
	}

	/**
	 * {@inheritdoc}
	 */
	public function getDataTypes(): array
	{
		return DdgDataType::all()->toArray();
	}
}
