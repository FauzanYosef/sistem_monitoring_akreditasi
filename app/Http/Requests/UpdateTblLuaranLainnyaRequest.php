<?php

namespace App\Http\Requests;

use App\Models\TblLuaranLainnya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTblLuaranLainnyaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_luaran_lainnya_edit');
    }

    public function rules()
    {
        return [
            'tahun' => [
                'string',
                'nullable',
            ],
        ];
    }
}