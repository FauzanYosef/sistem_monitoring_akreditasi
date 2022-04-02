<?php

namespace App\Http\Requests;

use App\Models\TblWaktuLulusan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTblWaktuLulusanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_waktu_lulusan_edit');
    }

    public function rules()
    {
        return [
            'average_tunggu_4' => [
                'numeric',
            ],
            'average_tunggu_3' => [
                'numeric',
            ],
            'average_tunggu_2' => [
                'numeric',
            ],
        ];
    }
}