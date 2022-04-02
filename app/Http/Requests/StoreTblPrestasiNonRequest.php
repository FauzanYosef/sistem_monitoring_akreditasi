<?php

namespace App\Http\Requests;

use App\Models\TblPrestasiNon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTblPrestasiNonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_prestasi_non_create');
    }

    public function rules()
    {
        return [
            'nama_kegiatan' => [
                'string',
                'nullable',
            ],
            'waktu' => [
                'string',
                'nullable',
            ],
        ];
    }
}