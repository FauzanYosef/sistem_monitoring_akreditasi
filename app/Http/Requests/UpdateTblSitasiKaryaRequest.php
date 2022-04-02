<?php

namespace App\Http\Requests;

use App\Models\TblSitasiKarya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTblSitasiKaryaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_sitasi_karya_edit');
    }

    public function rules()
    {
        return [
            'nama_penulis' => [
                'string',
                'nullable',
            ],
            'jml_artiker' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}