@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dataPt.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-pts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.id') }}
                        </th>
                        <td>
                            {{ $dataPt->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.kode_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->kode_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.nama_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->nama_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.jenis_pt') }}
                        </th>
                        <td>
                            {{ App\Models\DataPt::JENIS_PT_SELECT[$dataPt->jenis_pt] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.jenis_pengelolaan') }}
                        </th>
                        <td>
                            {{ App\Models\DataPt::JENIS_PENGELOLAAN_SELECT[$dataPt->jenis_pengelolaan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.status_pt') }}
                        </th>
                        <td>
                            {{ App\Models\DataPt::STATUS_PT_SELECT[$dataPt->status_pt] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.alamat_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->alamat_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.no_telp_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->no_telp_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.email_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->email_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.web_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->web_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.no_sk_pendirian_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->no_sk_pendirian_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.tgl_sk_pendirian_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->tgl_sk_pendirian_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.peringkat_akre_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->peringkat_akre_pt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.no_sk_banpt') }}
                        </th>
                        <td>
                            {{ $dataPt->no_sk_banpt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataPt.fields.ts_pt') }}
                        </th>
                        <td>
                            {{ $dataPt->ts_pt }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-pts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection