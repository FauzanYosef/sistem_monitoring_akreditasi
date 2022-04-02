@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelAkreProdi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-akre-prodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.status_akreditasi') }}
                        </th>
                        <td>
                            {{ App\Models\TabelAkreProdi::STATUS_AKREDITASI_SELECT[$tabelAkreProdi->status_akreditasi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_doktor') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_doktor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_magister') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_magister }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_sarjana') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_sarjana }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_profesi_2') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_profesi_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_profesi_1') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_profesi_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_profesi') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_profesi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_1') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_vokasi_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_2') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_vokasi_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_4') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_vokasi_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_5') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_vokasi_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_6') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_vokasi_6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_7') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->jml_vokasi_7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreProdi.fields.total') }}
                        </th>
                        <td>
                            {{ $tabelAkreProdi->total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-akre-prodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection