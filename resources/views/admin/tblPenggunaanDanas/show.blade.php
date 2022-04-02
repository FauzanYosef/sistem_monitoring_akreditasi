@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblPenggunaanDana.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-penggunaan-danas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPenggunaanDana.fields.id') }}
                        </th>
                        <td>
                            {{ $tblPenggunaanDana->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPenggunaanDana.fields.jenis_penggunaan') }}
                        </th>
                        <td>
                            {{ $tblPenggunaanDana->jenis_penggunaan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPenggunaanDana.fields.jml_ts_2') }}
                        </th>
                        <td>
                            {{ $tblPenggunaanDana->jml_ts_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPenggunaanDana.fields.jml_dana_ts_1') }}
                        </th>
                        <td>
                            {{ $tblPenggunaanDana->jml_dana_ts_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPenggunaanDana.fields.jml_dana_ts') }}
                        </th>
                        <td>
                            {{ $tblPenggunaanDana->jml_dana_ts }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPenggunaanDana.fields.jml') }}
                        </th>
                        <td>
                            {{ $tblPenggunaanDana->jml }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-penggunaan-danas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection