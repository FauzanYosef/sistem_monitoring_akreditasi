<?php

namespace App\Http\Requests;

use App\Models\TblTempatKerja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTblTempatKerjaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_tempat_kerja_create');
    }

    public function rules()
    {
        return [
            'jml_lulusan' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tingkat_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tingkat_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tingkat_3' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}