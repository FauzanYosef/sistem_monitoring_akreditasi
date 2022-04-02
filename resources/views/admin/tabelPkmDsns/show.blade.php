@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelPkmDsn.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-pkm-dsns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelPkmDsn->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.sumber_biaya') }}
                        </th>
                        <td>
                            {{ App\Models\TabelPkmDsn::SUMBER_BIAYA_SELECT[$tabelPkmDsn->sumber_biaya] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.jml_judul_1') }}
                        </th>
                        <td>
                            {{ $tabelPkmDsn->jml_judul_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.jml_judul_2') }}
                        </th>
                        <td>
                            {{ $tabelPkmDsn->jml_judul_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.jml_judul_3') }}
                        </th>
                        <td>
                            {{ $tabelPkmDsn->jml_judul_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $tabelPkmDsn->jumlah }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-pkm-dsns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection