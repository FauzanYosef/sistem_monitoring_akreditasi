<?php

namespace App\Http\Requests;

use App\Models\TabelDsntdkTetap;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelDsntdkTetapRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_dsntdk_tetap_create');
    }

    public function rules()
    {
        return [
            'guru_besar' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lektor_kepala' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lektor' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'asisten_ahli' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tenaga_pengajar' => [
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