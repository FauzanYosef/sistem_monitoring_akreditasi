<?php

namespace App\Http\Requests;

use App\Models\Borang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBorangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('borang_edit');
    }

    public function rules()
    {
        return [
            'nama_file' => [
                'string',
                'nullable',
            ],
        ];
    }
}