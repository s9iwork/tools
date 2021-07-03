<?php

namespace Tests\Unit\Services;

use App\Ams\Constants\AmsConstant;
use App\Ams\Services\AmsService;
use Illuminate\Contracts\Container\BindingResolutionException;
use ReflectionClass;
use ReflectionException;
use Tests\TestCase;

class AmsServiceTest extends TestCase
{
    /**
     *
     */
    public function test_calc()
    {
        $params = [
            [
                "type" => '1',
                "yield" => "1",
                "amount" => "100000"
            ]
        ];
        $expectData = $this->createExpectedData(100000, 1);

        // テスト
        $service = $this->app->make(AmsService::class);
        $result = $service->calc($params);

        // 簡易確認
        $this->assertSame($expectData['total'], $result['total_amount']);
        $this->assertSame($expectData['total'], $result['balance'][1]);
        $i = 0;
        foreach ($result["transition_history"] as $amount) {
            $this->assertSame($expectData['history'][$i], $amount);
            $i++;
        }
    }

    /**
     * @throws ReflectionException|BindingResolutionException
     */
    public function test_calcAssetBalance_資産残高が0、利回りが整数値()
    {
        $service = $this->app->make(AmsService::class);
        $reflectionService = new ReflectionClass(AmsService::class);
        $method = $reflectionService->getMethod('calcAssetBalance');
        $method->setAccessible(true);

        $result = $method->invoke($service, 0, 100000, 1);

        $this->assertEquals(101000, $result);
    }

    /**
     * @throws ReflectionException|BindingResolutionException
     */
    public function test_calcAssetBalance_資産残高が0でない、利回りが小数値()
    {
        $service = $this->app->make(AmsService::class);
        $reflectionService = new ReflectionClass(AmsService::class);
        $method = $reflectionService->getMethod('calcAssetBalance');
        $method->setAccessible(true);

        $result = $method->invoke($service, 100000, 100000, 0.1);

        $this->assertEquals(200200, $result);
    }

    /**
     * 期待値を作成する
     */
    private function createExpectedData(int $amount, float $yield) :array
    {
        $total = 0;
        $history = [];

        for ($i = 0; $i < AmsConstant::OPERATED_YEAR; $i++) {
            $total +=  $amount;
            $total = intval(floor($total * (1 + ($yield / 100))));

            $history[] = $total;
        }

        return [
            'total' => $total,
            'history' => $history
        ];
    }
}
