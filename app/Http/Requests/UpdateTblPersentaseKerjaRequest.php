<?php

namespace App\Http\Requests;

use App\Models\TblPersentaseKerja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTblPersentaseKerjaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tbl_persentase_kerja_edit');
    }

    public function rules()
    {
        return [
            'persen_4' => [
                'numeric',
            ],
            'persen_3' => [
                'numeric',
            ],
            'persen_2' => [
                'numeric',
            ],
        ];
    }
}