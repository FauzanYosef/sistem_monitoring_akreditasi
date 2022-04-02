<?php

namespace App\Http\Requests;

use App\Models\DataPt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataPtRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_pt_edit');
    }

    public function rules()
    {
        return [
            'kode_pt' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nama_pt' => [
                'string',
                'nullable',
            ],
            'no_telp_pt' => [
                'string',
                'nullable',
            ],
            'web_pt' => [
                'string',
                'nullable',
            ],
            'no_sk_pendirian_pt' => [
                'string',
                'nullable',
            ],
            'tgl_sk_pendirian_pt' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'peringkat_akre_pt' => [
                'string',
                'nullable',
            ],
            'no_sk_banpt' => [
                'string',
                'nullable',
            ],
            'ts_pt' => [
                'string',
                'nullable',
            ],
        ];
    }
}