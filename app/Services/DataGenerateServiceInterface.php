<?php

namespace App\Services;

/**
 * Interface DataGenerateServiceInterface
 * @package App\Services
 */
interface DataGenerateServiceInterface
{
	/**
	 * @param  array リクエストパラメータ
	 * @return array
	 */
	public function create(array $params=[]) :array;
}
