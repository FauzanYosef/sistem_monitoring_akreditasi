<?php

namespace App\Http\Requests;

use App\Models\TblTempatKerja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblTempatKerjaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_tempat_kerja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_tempat_kerjas,id',
        ];
    }
}