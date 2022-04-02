<?php

namespace App\Http\Requests;

use App\Models\DataAsesor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataAsesorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_asesor_edit');
    }

    public function rules()
    {
        return [
            'nip_assesor' => [
                'string',
                'nullable',
            ],
            'nama_asesor' => [
                'string',
                'nullable',
            ],
            'telp_asesor' => [
                'string',
                'nullable',
            ],
        ];
    }
}