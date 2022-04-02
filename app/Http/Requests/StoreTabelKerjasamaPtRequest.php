<?php

namespace App\Http\Requests;

use App\Models\TabelKerjasamaPt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelKerjasamaPtRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_kerjasama_pt_create');
    }

    public function rules()
    {
        return [
            'lembaga' => [
                'string',
                'nullable',
            ],
            'berlaku' => [
                'string',
                'nullable',
            ],
        ];
    }
}