<?php

namespace App\Http\Requests;

use App\Models\Kodeprodi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKodeprodiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kodeprodi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kodeprodis,id',
        ];
    }
}