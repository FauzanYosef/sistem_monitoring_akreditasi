<?php

namespace App\Http\Requests;

use App\Models\TabelAkreProdi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelAkreProdiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_akre_prodi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_akre_prodis,id',
        ];
    }
}