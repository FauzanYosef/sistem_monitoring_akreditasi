<?php

namespace App\Http\Requests;

use App\Models\TblKepuasan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTblKepuasanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tbl_kepuasan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tbl_kepuasans,id',
        ];
    }
}