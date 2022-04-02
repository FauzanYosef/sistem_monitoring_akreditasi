<?php

namespace App\Http\Requests;

use App\Models\TblPrestasiNon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblPrestasiNonRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_prestasi_non_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_prestasi_nons,id',
        ];
    }
}