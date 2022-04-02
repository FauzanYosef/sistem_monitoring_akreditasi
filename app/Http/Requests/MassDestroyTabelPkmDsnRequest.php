<?php

namespace App\Http\Requests;

use App\Models\TabelPkmDsn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelPkmDsnRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_pkm_dsn_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_pkm_dsns,id',
        ];
    }
}