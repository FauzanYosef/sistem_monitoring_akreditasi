<?php

namespace App\Http\Requests;

use App\Models\FormEssai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFormEssaiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('form_essai_create');
    }

    public function rules()
    {
        return [];
    }
}