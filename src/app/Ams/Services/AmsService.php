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
            $yearAmount = 0;

            // 資産ごとに資産額を計算
            foreach ($params as $asset) {
                // 現在の資産額に今年積立分を加算に利回り反映
                $baseAmount = $breakdown[$asset['type']] ?? 0;
                $baseAmount += $asset['amount'];
                $assetAmount = floor($baseAmount + ($baseAmount * $asset['yield'] / 100));

                // 資産内訳用
                $breakdown[$asset['type']] = $assetAmount;
                $yearAmount += $assetAmount;
            }

            // 資産推移用
            $transitionHistory[$year] = $yearAmount;
            $totalAmount += $yearAmount;
        }

        return [
            'total_amount' => $totalAmount,
            'transition_history' => $transitionHistory,
            "breakdown" => $breakdown,
        ];
    }
}
