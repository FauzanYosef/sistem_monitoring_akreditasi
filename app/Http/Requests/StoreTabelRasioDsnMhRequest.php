<?php

namespace App\Http\Requests;

use App\Models\TabelRasioDsnMh;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelRasioDsnMhRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_rasio_dsn_mh_create');
    }

    public function rules()
    {
        return [
            'jml_dosen' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_mhs' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_mhs_ta' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}