<?php

namespace App\Http\Requests;

use App\Models\TblKepuasan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTblKepuasanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_kepuasan_create');
    }

    public function rules()
    {
        return [
            'hasil_penilaian_4' => [
                'numeric',
            ],
            'hasil_penilaian_3' => [
                'numeric',
            ],
            'hasil_penilaian_2' => [
                'numeric',
            ],
            'hasil_penilaian' => [
                'numeric',
            ],
        ];
    }
}