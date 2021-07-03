<?php

namespace App\Http\Controllers\Ams;

use App\Ams\Services\IAmsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ams\CalcRequest;

class AmsController extends Controller
{

    /**
     * @var IAmsService
     */
    private $amsService;

    /**
     * AmsController constructor.
     * @param IAmsService $amsService
     */
    public function __construct(IAmsService $amsService)
    {
        $this->amsService = $amsService;
    }

    /**
     * calc
     */
    public function calc(CalcRequest $request): array
    {
        $param = $request->validated();
        return $this->amsService->calc($param['assets']);
    }
}
