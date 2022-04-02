<?php

namespace App\Http\Requests;

use App\Models\TblPublikasiIlmiah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTblPublikasiIlmiahRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_publikasi_ilmiah_create');
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