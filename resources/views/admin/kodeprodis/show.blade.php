@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kodeprodi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kodeprodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kodeprodi.fields.id') }}
                        </th>
                        <td>
                            {{ $kodeprodi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kodeprodi.fields.kode_prodi') }}
                        </th>
                        <td>
                            {{ $kodeprodi->kode_prodi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kodeprodi.fields.nama_prodi') }}
                        </th>
                        <td>
                            {{ $kodeprodi->nama_prodi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kodeprodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection