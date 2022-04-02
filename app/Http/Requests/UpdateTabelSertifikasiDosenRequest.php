<?php

namespace App\Http\Requests;

use App\Models\TabelSertifikasiDosen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTabelSertifikasiDosenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_sertifikasi_dosen_edit');
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
            'jml_dosen_sertifikat' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}