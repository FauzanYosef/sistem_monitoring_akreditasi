@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblSitasiKarya.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-sitasi-karyas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblSitasiKarya.fields.id') }}
                        </th>
                        <td>
                            {{ $tblSitasiKarya->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblSitasiKarya.fields.nama_penulis') }}
                        </th>
                        <td>
                            {{ $tblSitasiKarya->nama_penulis }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblSitasiKarya.fields.artikel') }}
                        </th>
                        <td>
                            {{ $tblSitasiKarya->artikel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblSitasiKarya.fields.jml_artiker') }}
                        </th>
                        <td>
                            {{ $tblSitasiKarya->jml_artiker }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-sitasi-karyas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection