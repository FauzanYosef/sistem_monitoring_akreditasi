<?php

namespace App\Http\Requests;

use App\Models\Kodeprodi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKodeprodiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kodeprodi_edit');
    }

    public function rules()
    {
        return [
            'kode_prodi' => [
                'string',
                'nullable',
            ],
            'nama_prodi' => [
                'string',
                'nullable',
            ],
        ];
    }
}