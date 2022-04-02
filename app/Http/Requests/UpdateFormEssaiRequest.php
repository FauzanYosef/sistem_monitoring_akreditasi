<?php

namespace App\Http\Requests;

use App\Models\FormEssai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFormEssaiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('form_essai_edit');
    }

    public function rules()
    {
        return [];
    }
}