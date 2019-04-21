<?php

namespace App\Services;

/**
 * Interface DataGenerateServiceInterface
 * @package App\Services
 */
interface DataGenerateServiceInterface
{
	/**
	 * カテゴリー、データ種別などの初期データを取得する
	 *
	 * @param array $params リクエストパラメータ
	 * @return array
	 */
	public function getInitialData(): array;

	/**
	 * ダミーデータを生成する
	 *
	 * @param  array リクエストパラメータ
	 * @return array
	 */
	public function create(array $params=[]) :array;
}
