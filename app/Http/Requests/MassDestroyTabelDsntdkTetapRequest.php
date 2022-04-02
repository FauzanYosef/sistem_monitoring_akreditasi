<?php

namespace App\Http\Requests;

use App\Models\TabelDsntdkTetap;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelDsntdkTetapRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_dsntdk_tetap_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_dsntdk_tetaps,id',
        ];
    }
}