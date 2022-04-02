@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblIpk.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-ipks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.id') }}
                        </th>
                        <td>
                            {{ $tblIpk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.program_pendidikan') }}
                        </th>
                        <td>
                            {{ App\Models\TblIpk::PROGRAM_PENDIDIKAN_SELECT[$tblIpk->program_pendidikan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.jumlah_ps') }}
                        </th>
                        <td>
                            {{ $tblIpk->jumlah_ps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.jml_lulusan_2') }}
                        </th>
                        <td>
                            {{ $tblIpk->jml_lulusan_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.jml_lulusan_1') }}
                        </th>
                        <td>
                            {{ $tblIpk->jml_lulusan_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.jml_lulusan') }}
                        </th>
                        <td>
                            {{ $tblIpk->jml_lulusan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.average_ipk_2') }}
                        </th>
                        <td>
                            {{ $tblIpk->average_ipk_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.average_ipk_1') }}
                        </th>
                        <td>
                            {{ $tblIpk->average_ipk_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblIpk.fields.average_ipk') }}
                        </th>
                        <td>
                            {{ $tblIpk->average_ipk }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-ipks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection