<?php

namespace App\Http\Requests;

use App\Models\TabelSertifikasiEksternal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelSertifikasiEksternalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_sertifikasi_eksternal_create');
    }

    public function rules()
    {
        return [
            'lembaga_akreditasi' => [
                'string',
                'nullable',
            ],
            'jenis_akreditasi' => [
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