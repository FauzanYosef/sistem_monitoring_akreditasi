@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblPrestasiAkademik.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-prestasi-akademiks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiAkademik.fields.id') }}
                        </th>
                        <td>
                            {{ $tblPrestasiAkademik->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiAkademik.fields.nama_kegiatan') }}
                        </th>
                        <td>
                            {{ $tblPrestasiAkademik->nama_kegiatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiAkademik.fields.waktu') }}
                        </th>
                        <td>
                            {{ $tblPrestasiAkademik->waktu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiAkademik.fields.tingkat') }}
                        </th>
                        <td>
                            {{ App\Models\TblPrestasiAkademik::TINGKAT_SELECT[$tblPrestasiAkademik->tingkat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiAkademik.fields.prestasi') }}
                        </th>
                        <td>
                            {{ $tblPrestasiAkademik->prestasi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-prestasi-akademiks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection