<?php

namespace App\Http\Requests;

use App\Models\TblReferensi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblReferensiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_referensi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_referensis,id',
        ];
    }
}