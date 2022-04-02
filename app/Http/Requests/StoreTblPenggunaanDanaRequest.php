<?php

namespace App\Http\Requests;

use App\Models\TblPenggunaanDana;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTblPenggunaanDanaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_penggunaan_dana_create');
    }

    public function rules()
    {
        return [
            'jenis_penggunaan' => [
                'string',
                'nullable',
            ],
        ];
    }
}