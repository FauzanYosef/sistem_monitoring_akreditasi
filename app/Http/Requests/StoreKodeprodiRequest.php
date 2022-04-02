<?php

namespace App\Http\Requests;

use App\Models\Kodeprodi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKodeprodiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kodeprodi_create');
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