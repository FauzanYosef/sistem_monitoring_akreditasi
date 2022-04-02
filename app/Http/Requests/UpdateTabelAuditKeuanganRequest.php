<?php

namespace App\Http\Requests;

use App\Models\TabelAuditKeuangan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTabelAuditKeuanganRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_audit_keuangan_edit');
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