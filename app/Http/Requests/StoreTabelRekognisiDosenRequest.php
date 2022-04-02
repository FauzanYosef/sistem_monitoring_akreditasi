<?php

namespace App\Http\Requests;

use App\Models\TabelRekognisiDosen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelRekognisiDosenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_rekognisi_dosen_create');
    }

    public function rules()
    {
        return [
            'nama_dosen' => [
                'string',
                'nullable',
            ],
            'keahlian' => [
                'string',
                'nullable',
            ],
            'tahun' => [
                'string',
                'nullable',
            ],
        ];
    }
}