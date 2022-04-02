<?php

namespace App\Http\Requests;

use App\Models\TblPrestasiAkademik;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblPrestasiAkademikRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_prestasi_akademik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_prestasi_akademiks,id',
        ];
    }
}