<?php

namespace App\Http\Requests;

use App\Models\TabelKerjasamaPt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTabelKerjasamaPtRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tabel_kerjasama_pt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tabel_kerjasama_pts,id',
        ];
    }
}