<?php

namespace App\Http\Requests;

use App\Models\TblLamaStudi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTblLamaStudiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_lama_studi_create');
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
            'average_masa_2' => [
                'numeric',
            ],
            'average_masa_1' => [
                'numeric',
            ],
            'average_masa' => [
                'numeric',
            ],
        ];
    }
}