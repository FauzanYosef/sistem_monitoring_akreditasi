@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblRasioLulu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-rasio-lulus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.id') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.prodi') }}
                        </th>
                        <td>
                            {{ App\Models\TblRasioLulu::PRODI_SELECT[$tblRasioLulu->prodi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.tahun_masuk') }}
                        </th>
                        <td>
                            {{ App\Models\TblRasioLulu::TAHUN_MASUK_SELECT[$tblRasioLulu->tahun_masuk] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_6') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->jml_mhs_6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_5') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->jml_mhs_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_4') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->jml_mhs_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_3') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->jml_mhs_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_2') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->jml_mhs_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_1') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->jml_mhs_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->jml_mhs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_lulusan') }}
                        </th>
                        <td>
                            {{ $tblRasioLulu->jml_lulusan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-rasio-lulus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection