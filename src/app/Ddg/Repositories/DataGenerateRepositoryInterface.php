<?php

declare(strict_types=1);

namespace App\Ddg\Repositories;

/**
 * Interface DataGenerateRepositoryInterface.
 */
interface DataGenerateRepositoryInterface
{
    /**
     * カテゴリーを取得する.
     *
     * @return array
     */
    public function getCategories(): array;

    /**
     * データ種別を取得する.
     *
     * @return array
     */
    public function getDataTypes(): array;
}
