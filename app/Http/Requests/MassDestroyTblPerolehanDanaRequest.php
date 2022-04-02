<?php

namespace App\Http\Requests;

use App\Models\TblPerolehanDana;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblPerolehanDanaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_perolehan_dana_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_perolehan_danas,id',
        ];
    }
}