<?php

namespace App\Http\Requests;

use App\Models\TabelAuditKeuangan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelAuditKeuanganRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_audit_keuangan_create');
    }

    public function rules()
    {
        return [
            'lembaga_audit' => [
                'string',
                'nullable',
            ],
            'tahun' => [
                'string',
                'nullable',
            ],
        ];
    }
}