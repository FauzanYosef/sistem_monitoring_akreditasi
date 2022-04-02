@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblPrestasiNon.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-prestasi-nons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.id') }}
                        </th>
                        <td>
                            {{ $tblPrestasiNon->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.nama_kegiatan') }}
                        </th>
                        <td>
                            {{ $tblPrestasiNon->nama_kegiatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.waktu') }}
                        </th>
                        <td>
                            {{ $tblPrestasiNon->waktu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.tingkat') }}
                        </th>
                        <td>
                            {{ App\Models\TblPrestasiNon::TINGKAT_SELECT[$tblPrestasiNon->tingkat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.prestasi') }}
                        </th>
                        <td>
                            {{ $tblPrestasiNon->prestasi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-prestasi-nons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection