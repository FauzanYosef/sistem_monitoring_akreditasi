<?php

namespace App\Http\Requests;

use App\Models\DataProdi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataProdiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_prodi_edit');
    }

    public function rules()
    {
        return [
            'telp_prodi' => [
                'string',
                'nullable',
            ],
            'web_prodi' => [
                'string',
                'nullable',
            ],
            'alamat_prodi' => [
                'string',
                'nullable',
            ],
        ];
    }
}