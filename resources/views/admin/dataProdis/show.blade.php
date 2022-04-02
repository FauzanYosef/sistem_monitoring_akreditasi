@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dataProdi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-prodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.id') }}
                        </th>
                        <td>
                            {{ $dataProdi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.id_pt') }}
                        </th>
                        <td>
                            {{ $dataProdi->id_pt->nama_pt ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.kode_prodi') }}
                        </th>
                        <td>
                            {{ $dataProdi->kode_prodi->nama_prodi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.jenjang_prodi') }}
                        </th>
                        <td>
                            {{ App\Models\DataProdi::JENJANG_PRODI_SELECT[$dataProdi->jenjang_prodi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.telp_prodi') }}
                        </th>
                        <td>
                            {{ $dataProdi->telp_prodi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.email_prodi') }}
                        </th>
                        <td>
                            {{ $dataProdi->email_prodi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.web_prodi') }}
                        </th>
                        <td>
                            {{ $dataProdi->web_prodi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.alamat_prodi') }}
                        </th>
                        <td>
                            {{ $dataProdi->alamat_prodi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataProdi.fields.status_prodi') }}
                        </th>
                        <td>
                            {{ App\Models\DataProdi::STATUS_PRODI_SELECT[$dataProdi->status_prodi] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-prodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection