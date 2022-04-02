@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dataAsesor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-asesors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.id') }}
                        </th>
                        <td>
                            {{ $dataAsesor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.nip_assesor') }}
                        </th>
                        <td>
                            {{ $dataAsesor->nip_assesor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.nama_asesor') }}
                        </th>
                        <td>
                            {{ $dataAsesor->nama_asesor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.email_assesor') }}
                        </th>
                        <td>
                            {{ $dataAsesor->email_assesor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.telp_asesor') }}
                        </th>
                        <td>
                            {{ $dataAsesor->telp_asesor }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-asesors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection