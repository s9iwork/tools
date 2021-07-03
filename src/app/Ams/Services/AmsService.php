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
        $balance = [];

        $year = date("Y");
        for ($i = 0; $i < AmsConstant::OPERATED_YEAR; $i++) {
            $year++;
            $yearAmount = 0;

            // 資産ごとに資産額を計算
            foreach ($params as $asset) {
                // 今年の資産残高
                $assetBalance = $this->calcAssetBalance($balance[$asset['type']] ?? 0, intval($asset['amount']), floatval($asset['yield']));

                // 資産内訳用
                $balance[$asset['type']] = $assetBalance;
                $yearAmount += $assetBalance;
            }

            // 資産推移用
            $transitionHistory[$year] = $yearAmount;
            $totalAmount += $yearAmount;
        }

        return [
            'total_amount' => $totalAmount,
            'transition_history' => $transitionHistory,
            "balance" => $balance,
        ];
    }

    /**
     * 資産残高を計算する
     *
     * @param int $balance
     * @param int $reserveAmount
     * @param float $yield
     * @return int
     */
    private function calcAssetBalance(int $balance, int $reserveAmount, float $yield): int
    {
        // 現在の資産残高に今年積立分を加算し利息加算
        $balance += $reserveAmount;

        return intval(floor($balance + ($balance * $yield / 100)));
    }
}
