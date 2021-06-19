<?php

declare(strict_types=1);

namespace App\Ddg\Services;

/**
 * Interface DataGenerateServiceInterface.
 */
interface DataGenerateServiceInterface
{
    /**
     * カテゴリー、データ種別などの初期データを取得する.
     *
     * @return array
     */
    public function getInitialData(): array;

    /**
     * ダミーデータを生成する.
     *
     * @param array リクエストパラメータ
     * @param array $params
     * @return array
     */
    public function create(array $params = []): array;
}
