<?php

namespace App\Http\Requests;

use App\Models\TblSitasiKarya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblSitasiKaryaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_sitasi_karya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_sitasi_karyas,id',
        ];
    }
}