<?php

namespace App\Http\Requests;

use App\Models\TblPrestasiAkademik;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTblPrestasiAkademikRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_prestasi_akademik_create');
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