@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblTempatKerja.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-tempat-kerjas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblTempatKerja.fields.id') }}
                        </th>
                        <td>
                            {{ $tblTempatKerja->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblTempatKerja.fields.program_pendidikan') }}
                        </th>
                        <td>
                            {{ App\Models\TblTempatKerja::PROGRAM_PENDIDIKAN_SELECT[$tblTempatKerja->program_pendidikan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblTempatKerja.fields.jml_lulusan') }}
                        </th>
                        <td>
                            {{ $tblTempatKerja->jml_lulusan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblTempatKerja.fields.tingkat_1') }}
                        </th>
                        <td>
                            {{ $tblTempatKerja->tingkat_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblTempatKerja.fields.tingkat_2') }}
                        </th>
                        <td>
                            {{ $tblTempatKerja->tingkat_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblTempatKerja.fields.tingkat_3') }}
                        </th>
                        <td>
                            {{ $tblTempatKerja->tingkat_3 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-tempat-kerjas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection