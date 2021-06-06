<?php

namespace App\Http\Controllers\Ddg;

use App\Ddg\Services\DataGenerateServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class DataGenerateController
 * @package App\Http\Controllers
 */
class DataGenerateController extends Controller
{
    /**
     * @var DataGenerateServiceInterface
     */
    private $data_generate_service;

    /**
     * DataGenerateController constructor.
     * @param DataGenerateServiceInterface $data_generate_service
     */
    public function __construct(DataGenerateServiceInterface $data_generate_service)
    {
        $this->data_generate_service = $data_generate_service;
    }

    /**
     * 初期データを取得する
     *
     * @return array
     * @throws
     */
    public function getInitialData(): array
    {
        list($categories, $data_types) = $this->data_generate_service->getInitialData();

        return [
            'categories' => $categories,
            'data_types' => $data_types,
        ];
    }

    /**
     * ダミーデータを生成する
     *
     * @return array
     * @throws
     */
    public function create(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'type' => 'required|integer|min:1|max:40'
        ]);
        $response = $this->data_generate_service->create($request->all());

        return [
            'items' => $response
        ];
    }
}
