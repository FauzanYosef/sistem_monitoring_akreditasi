<?php

namespace App\Http\Requests;

use App\Models\Fileupload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFileuploadRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fileupload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fileuploads,id',
        ];
    }
}