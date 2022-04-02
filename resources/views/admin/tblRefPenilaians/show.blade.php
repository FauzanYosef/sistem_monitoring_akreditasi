@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblRefPenilaian.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-ref-penilaians.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.id') }}
                        </th>
                        <td>
                            {{ $tblRefPenilaian->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.program_pendidikan') }}
                        </th>
                        <td>
                            {{ App\Models\TblRefPenilaian::PROGRAM_PENDIDIKAN_SELECT[$tblRefPenilaian->program_pendidikan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_4') }}
                        </th>
                        <td>
                            {{ $tblRefPenilaian->jml_lulusan_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_3') }}
                        </th>
                        <td>
                            {{ $tblRefPenilaian->jml_lulusan_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jml_lulusan') }}
                        </th>
                        <td>
                            {{ $tblRefPenilaian->jml_lulusan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_4') }}
                        </th>
                        <td>
                            {{ $tblRefPenilaian->jwb_lulusan_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_3') }}
                        </th>
                        <td>
                            {{ $tblRefPenilaian->jwb_lulusan_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_2') }}
                        </th>
                        <td>
                            {{ $tblRefPenilaian->jwb_lulusan_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-ref-penilaians.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection