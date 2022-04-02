<?php

namespace App\Http\Requests;

use App\Models\TblPerolehanDana;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTblPerolehanDanaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_perolehan_dana_create');
    }

    public function rules()
    {
        return [
            'jenis_dana' => [
                'string',
                'nullable',
            ],
        ];
    }
}