<?php

namespace App\Http\Requests;

use App\Models\TblRasioLulu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblRasioLuluRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_rasio_lulu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_rasio_lulus,id',
        ];
    }
}