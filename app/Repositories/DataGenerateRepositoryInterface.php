<?php

namespace App\Repositories;

/**
 * Interface DataGenerateRepositoryInterface
 * @package App\Repositories
 */
interface DataGenerateRepositoryInterface
{
	/**
	 * カテゴリーを取得する
	 *
	 * @return array
	 */
	public function getCategories(): array;

	/**
	 * データ種別を取得する
	 *
	 * @return array
	 */
	public function getDataTypes(): array;
}
