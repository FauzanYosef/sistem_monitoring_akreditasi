@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblLamaStudi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-lama-studis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.id') }}
                        </th>
                        <td>
                            {{ $tblLamaStudi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.program_pendidikan') }}
                        </th>
                        <td>
                            {{ App\Models\TblLamaStudi::PROGRAM_PENDIDIKAN_SELECT[$tblLamaStudi->program_pendidikan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.jumlah_ps') }}
                        </th>
                        <td>
                            {{ $tblLamaStudi->jumlah_ps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.jml_lulusan_2') }}
                        </th>
                        <td>
                            {{ $tblLamaStudi->jml_lulusan_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.jml_lulusan_1') }}
                        </th>
                        <td>
                            {{ $tblLamaStudi->jml_lulusan_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.jml_lulusan') }}
                        </th>
                        <td>
                            {{ $tblLamaStudi->jml_lulusan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.average_masa_2') }}
                        </th>
                        <td>
                            {{ $tblLamaStudi->average_masa_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.average_masa_1') }}
                        </th>
                        <td>
                            {{ $tblLamaStudi->average_masa_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.average_masa') }}
                        </th>
                        <td>
                            {{ $tblLamaStudi->average_masa }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-lama-studis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection