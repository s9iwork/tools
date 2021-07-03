<?php

namespace App\Http\Requests\Ams;

use Illuminate\Foundation\Http\FormRequest;

class CalcRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'assets' => 'required|array',
            'assets.*.type' => 'required|int',
            'assets.*.yield' => 'required|numeric',
            'assets.*.amount' => 'required|int',
        ];
    }
}
