<?php

declare(strict_types=1);

namespace App\Ams\Services;

use App\Ams\Constants\AmsConstant;

/**
 * Class AmsService.
 */
class AmsService implements IAmsService
{
    /**
     * {@inheritdoc}
     */
    public function calc(array $params = []): array
    {
        $totalAmount = 0;
        $transitionHistory = [];
        $breakdown = [];

        $year = date("Y");
        for ($i = 0; $i < AmsConstant::OPERATED_YEAR; $i++) {
            $year++;

            // 資産ごとに運用額を計算
            foreach ($params as $asset) {
                $baseAmount = $breakdown[$asset['type']] ?? $asset['amount'];
                $yearAmount = floor($baseAmount + ($baseAmount * $asset['yield'] / 100));

                // 資産内訳用
                $breakdown[$asset['type']] = $yearAmount;
                $totalAmount += $yearAmount;
            }

            // 資産推移用
            $transitionHistory[$year] = $totalAmount;
        }

        return [
            'total_amount' => $totalAmount,
            'transition_history' => $transitionHistory,
            "breakdown" => $breakdown,
        ];
    }
}
