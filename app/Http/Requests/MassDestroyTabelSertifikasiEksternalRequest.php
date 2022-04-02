<?php

namespace App\Http\Requests;

use App\Models\TabelSertifikasiEksternal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelSertifikasiEksternalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_sertifikasi_eksternal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_sertifikasi_eksternals,id',
        ];
    }
}