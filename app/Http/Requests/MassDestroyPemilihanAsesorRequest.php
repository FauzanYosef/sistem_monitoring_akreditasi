<?php

namespace App\Http\Requests;

use App\Models\PemilihanAsesor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPemilihanAsesorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pemilihan_asesor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pemilihan_asesors,id',
        ];
    }
}