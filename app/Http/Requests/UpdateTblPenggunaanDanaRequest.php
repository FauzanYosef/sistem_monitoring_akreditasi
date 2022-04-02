<?php

namespace App\Http\Requests;

use App\Models\TblPenggunaanDana;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTblPenggunaanDanaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_penggunaan_dana_edit');
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