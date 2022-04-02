@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblPerolehanDana.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-perolehan-danas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPerolehanDana.fields.id') }}
                        </th>
                        <td>
                            {{ $tblPerolehanDana->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPerolehanDana.fields.sumber_dana') }}
                        </th>
                        <td>
                            {{ App\Models\TblPerolehanDana::SUMBER_DANA_SELECT[$tblPerolehanDana->sumber_dana] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPerolehanDana.fields.jenis_dana') }}
                        </th>
                        <td>
                            {{ $tblPerolehanDana->jenis_dana }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPerolehanDana.fields.jml_ts_2') }}
                        </th>
                        <td>
                            {{ $tblPerolehanDana->jml_ts_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPerolehanDana.fields.jml_dana_ts_1') }}
                        </th>
                        <td>
                            {{ $tblPerolehanDana->jml_dana_ts_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPerolehanDana.fields.jml_dana_ts') }}
                        </th>
                        <td>
                            {{ $tblPerolehanDana->jml_dana_ts }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPerolehanDana.fields.jml') }}
                        </th>
                        <td>
                            {{ $tblPerolehanDana->jml }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-perolehan-danas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection