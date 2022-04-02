@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblPublikasiIlmiah.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-publikasi-ilmiahs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.id') }}
                        </th>
                        <td>
                            {{ $tblPublikasiIlmiah->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jenis_publikasi') }}
                        </th>
                        <td>
                            {{ App\Models\TblPublikasiIlmiah::JENIS_PUBLIKASI_SELECT[$tblPublikasiIlmiah->jenis_publikasi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_1') }}
                        </th>
                        <td>
                            {{ $tblPublikasiIlmiah->jml_judul_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_2') }}
                        </th>
                        <td>
                            {{ $tblPublikasiIlmiah->jml_judul_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_3') }}
                        </th>
                        <td>
                            {{ $tblPublikasiIlmiah->jml_judul_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $tblPublikasiIlmiah->jumlah }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-publikasi-ilmiahs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection