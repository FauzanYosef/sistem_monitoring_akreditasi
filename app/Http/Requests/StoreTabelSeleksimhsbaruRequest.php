<?php

namespace App\Http\Requests;

use App\Models\TabelSeleksimhsbaru;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelSeleksimhsbaruRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_seleksimhsbaru_create');
    }

    public function rules()
    {
        return [
            'program_studi' => [
                'string',
                'nullable',
            ],
            'tahun_akademik' => [
                'string',
                'nullable',
            ],
            'daya_tampung' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jumlah_calon_pendaftar' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jumlah_lulus_seleksi' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_mhs_baru_reguler' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_mhs_transfer' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_mhs_reguler' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_mhs_transfer' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}