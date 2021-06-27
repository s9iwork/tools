<?php

declare(strict_types=1);

namespace App\Ams\Services;

/**
 * Interface IAmsService.
 */
interface IAmsService
{
    /**
     * calc.
     *
     * @param array $params
     * @return array
     */
    public function calc(array $params = []): array;
}
