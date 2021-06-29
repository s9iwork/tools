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

        for ($i = 0; $i < AmsConstant::OPERATED_YEAR; $i++) {
            // 資産ごとに運用額を計算
            foreach ($params as $asset) {
                $yearAmount = floor($asset['amount'] + ($asset['amount'] * $asset['yield'] / 100));

                // 資産内訳用
                if (!isset($breakdown[$asset['type']])) {
                    $breakdown[$asset['type']] = 0;
                }
                $breakdown[$asset['type']] += $yearAmount;
                $totalAmount += $yearAmount;
            }

            // 資産推移用
            $transitionHistory[] = $totalAmount;
        }

        return [
            'total_amount' => $totalAmount,
            'transition_history' => $transitionHistory,
            "breakdown" => $breakdown,
        ];
    }
}
