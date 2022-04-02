<?php

namespace App\Http\Requests;

use App\Models\TabelPenelitianDosen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelPenelitianDosenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_penelitian_dosen_create');
    }

    public function rules()
    {
        return [
            'jml_judul_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_judul_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_judul_3' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jumlah' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}