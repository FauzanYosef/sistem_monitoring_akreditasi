<?php

namespace App\Http\Requests;

use App\Models\PeniliaianAssesor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePeniliaianAssesorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('peniliaian_assesor_create');
    }

    public function rules()
    {
        return [
            'nilai' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}