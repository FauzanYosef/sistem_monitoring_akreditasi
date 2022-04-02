<?php

namespace App\Http\Requests;

use App\Models\TabelRekognisiDosen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelRekognisiDosenRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_rekognisi_dosen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_rekognisi_dosens,id',
        ];
    }
}