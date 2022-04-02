<?php

namespace App\Http\Requests;

use App\Models\DataPengajuan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataPengajuanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_pengajuan_create');
    }

    public function rules()
    {
        return [
            'tahun_pengajuan' => [
                'string',
                'nullable',
            ],
        ];
    }
}