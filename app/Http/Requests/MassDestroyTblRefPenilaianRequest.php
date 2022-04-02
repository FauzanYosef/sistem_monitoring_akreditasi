<?php

namespace App\Http\Requests;

use App\Models\TblRefPenilaian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblRefPenilaianRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_ref_penilaian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_ref_penilaians,id',
        ];
    }
}