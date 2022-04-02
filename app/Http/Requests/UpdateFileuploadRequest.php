<?php

namespace App\Http\Requests;

use App\Models\Fileupload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFileuploadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fileupload_edit');
    }

    public function rules()
    {
        return [];
    }
}