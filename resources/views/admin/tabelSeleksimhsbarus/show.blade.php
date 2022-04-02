@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelSeleksimhsbaru.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-seleksimhsbarus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.program_studi') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->program_studi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.tahun_akademik') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->tahun_akademik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.daya_tampung') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->daya_tampung }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.jumlah_calon_pendaftar') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->jumlah_calon_pendaftar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.jumlah_lulus_seleksi') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->jumlah_lulus_seleksi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.jml_mhs_baru_reguler') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->jml_mhs_baru_reguler }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.jml_mhs_transfer') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->jml_mhs_transfer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.total_mhs_reguler') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->total_mhs_reguler }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.total_mhs_transfer') }}
                        </th>
                        <td>
                            {{ $tabelSeleksimhsbaru->total_mhs_transfer }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-seleksimhsbarus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection