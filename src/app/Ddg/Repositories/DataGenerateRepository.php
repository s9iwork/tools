<?php

declare(strict_types=1);

namespace App\Ddg\Repositories;

use App\Ddg\Models\DdgCategory;
use App\Ddg\Models\DdgDataType;

/**
 * Class DataGenerateRepository.
 */
class DataGenerateRepository implements DataGenerateRepositoryInterface
{
    /**
     * @var DdgCategory
     */
    private $ddgCategory;

    /**
     * @var DdgDataType
     */
    private $ddgDataType;

    /**
     * DataGenerateRepository constructor.
     *
     * @param DdgCategory $ddgCategory
     * @param DdgDataType $ddgDataType
     */
    public function __construct(DdgCategory $ddgCategory, DdgDataType $ddgDataType)
    {
        $this->ddgCategory = $ddgCategory;
        $this->ddgDataType = $ddgDataType;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategories(): array
    {
        return $this->ddgCategory->all()->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function getDataTypes(): array
    {
        return $this->ddgDataType->all()->toArray();
    }
}
