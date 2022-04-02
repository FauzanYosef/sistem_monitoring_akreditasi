<?php

namespace App\Http\Requests;

use App\Models\TblIpk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTblIpkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_ipk_edit');
    }

    public function rules()
    {
        return [
            'jumlah_ps' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_lulusan_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_lulusan_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jml_lulusan' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'average_ipk_2' => [
                'numeric',
            ],
            'average_ipk_1' => [
                'numeric',
            ],
            'average_ipk' => [
                'numeric',
            ],
        ];
    }
}