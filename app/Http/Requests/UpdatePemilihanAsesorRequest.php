<?php

namespace App\Http\Requests;

use App\Models\PemilihanAsesor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePemilihanAsesorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pemilihan_asesor_edit');
    }

    public function rules()
    {
        return [
            'id_pemilihan' => [
                'string',
                'nullable',
            ],
        ];
    }
}