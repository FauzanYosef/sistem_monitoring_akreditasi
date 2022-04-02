<?php

namespace App\Http\Requests;

use App\Models\TblWaktuLulusan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblWaktuLulusanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_waktu_lulusan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_waktu_lulusans,id',
        ];
    }
}