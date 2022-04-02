<?php

namespace App\Http\Requests;

use App\Models\TabelMhsAsing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelMhsAsingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_mhs_asing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_mhs_asings,id',
        ];
    }
}