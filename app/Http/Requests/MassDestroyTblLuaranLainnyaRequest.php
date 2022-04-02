<?php

namespace App\Http\Requests;

use App\Models\TblLuaranLainnya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblLuaranLainnyaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_luaran_lainnya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_luaran_lainnyas,id',
        ];
    }
}