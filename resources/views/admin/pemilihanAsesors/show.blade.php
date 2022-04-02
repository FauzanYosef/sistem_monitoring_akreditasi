@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pemilihanAsesor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemilihan-asesors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilihanAsesor.fields.id') }}
                        </th>
                        <td>
                            {{ $pemilihanAsesor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilihanAsesor.fields.prodi') }}
                        </th>
                        <td>
                            {{ $pemilihanAsesor->prodi->nama_prodi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilihanAsesor.fields.id_assesor') }}
                        </th>
                        <td>
                            {{ $pemilihanAsesor->id_assesor->nama_asesor ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilihanAsesor.fields.id_pemilihan') }}
                        </th>
                        <td>
                            {{ $pemilihanAsesor->id_pemilihan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemilihan-asesors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection