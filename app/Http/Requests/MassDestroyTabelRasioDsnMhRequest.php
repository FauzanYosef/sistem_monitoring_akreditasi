<?php

namespace App\Http\Requests;

use App\Models\TabelRasioDsnMh;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelRasioDsnMhRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_rasio_dsn_mh_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_rasio_dsn_mhs,id',
        ];
    }
}