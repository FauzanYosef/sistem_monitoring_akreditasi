<?php

namespace App\Http\Requests;

use App\Models\TabelAuditKeuangan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelAuditKeuanganRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_audit_keuangan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_audit_keuangans,id',
        ];
    }
}