<?php

namespace App\Http\Requests;

use App\Models\PenilaianIndikator;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePenilaianIndikatorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('penilaian_indikator_edit');
    }

    public function rules()
    {
        return [
            'label_nilai' => [
                'string',
                'nullable',
            ],
            'skor_nilai' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}