<?php

namespace App\Http\Requests;

use App\Models\TabelKckpanDsn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTabelKckpanDsnRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tabel_kckpan_dsn_create');
    }

    public function rules()
    {
        return [
            'doktor' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'magister' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'profesi' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jumlah' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}