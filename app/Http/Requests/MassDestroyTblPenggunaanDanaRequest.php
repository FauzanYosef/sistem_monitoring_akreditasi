<?php

namespace App\Http\Requests;

use App\Models\TblPenggunaanDana;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblPenggunaanDanaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_penggunaan_dana_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_penggunaan_danas,id',
        ];
    }
}