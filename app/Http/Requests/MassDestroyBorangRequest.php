<?php

namespace App\Http\Requests;

use App\Models\Borang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBorangRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('borang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:borangs,id',
        ];
    }
}