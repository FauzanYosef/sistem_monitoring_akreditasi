@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fileupload.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fileuploads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fileupload.fields.id') }}
                        </th>
                        <td>
                            {{ $fileupload->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fileupload.fields.namafile') }}
                        </th>
                        <td>
                            {{ $fileupload->namafile->nama_file ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fileupload.fields.uploaddata') }}
                        </th>
                        <td>
                            @if($fileupload->uploaddata)
                                <a href="{{ $fileupload->uploaddata->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fileupload.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $fileupload->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fileuploads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection