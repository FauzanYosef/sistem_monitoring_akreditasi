<?php

namespace App\Http\Requests;

use App\Models\TabelMhsAsing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelMhsAsingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_mhs_asing_create');
    }

    public function rules()
    {
        return [
            'ts_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ts_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ts' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}