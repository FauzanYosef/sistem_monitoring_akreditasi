@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblReferensi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-referensis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.id') }}
                        </th>
                        <td>
                            {{ $tblReferensi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.program_pendidikan') }}
                        </th>
                        <td>
                            {{ App\Models\TblReferensi::PROGRAM_PENDIDIKAN_SELECT[$tblReferensi->program_pendidikan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.banyak_lulusan_3') }}
                        </th>
                        <td>
                            {{ $tblReferensi->banyak_lulusan_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.banyak_lulusan_2') }}
                        </th>
                        <td>
                            {{ $tblReferensi->banyak_lulusan_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.banyak_lulusan') }}
                        </th>
                        <td>
                            {{ $tblReferensi->banyak_lulusan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.nilai_lulusan_3') }}
                        </th>
                        <td>
                            {{ $tblReferensi->nilai_lulusan_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.nilai_lulusan_2') }}
                        </th>
                        <td>
                            {{ $tblReferensi->nilai_lulusan_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.nilai_lulusan_1') }}
                        </th>
                        <td>
                            {{ $tblReferensi->nilai_lulusan_1 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-referensis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection