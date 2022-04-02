<?php

namespace App\Http\Requests;

use App\Models\PenilaianIndikator;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPenilaianIndikatorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('penilaian_indikator_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:penilaian_indikators,id',
        ];
    }
}