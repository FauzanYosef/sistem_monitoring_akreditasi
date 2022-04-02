<?php

namespace App\Http\Requests;

use App\Models\IndikatorPenilaian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIndikatorPenilaianRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('indikator_penilaian_edit');
    }

    public function rules()
    {
        return [
            'elemen' => [
                'string',
                'required',
            ],
        ];
    }
}