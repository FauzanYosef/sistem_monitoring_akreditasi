<?php

namespace App\Http\Requests;

use App\Models\IndikatorPenilaian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIndikatorPenilaianRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('indikator_penilaian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:indikator_penilaians,id',
        ];
    }
}