<?php

namespace App\Http\Requests;

use App\Models\TabelAkreditasiProdi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTabelAkreditasiProdiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_akreditasi_prodi_edit');
    }

    public function rules()
    {
        return [
            'lembaga_akreditasi_internasional' => [
                'string',
                'nullable',
            ],
            'masa_berlaku' => [
                'string',
                'nullable',
            ],
        ];
    }
}