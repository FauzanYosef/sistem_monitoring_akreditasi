@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelRasioDsnMh.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-rasio-dsn-mhs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelRasioDsnMh->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.unit_pengelola') }}
                        </th>
                        <td>
                            {{ App\Models\TabelRasioDsnMh::UNIT_PENGELOLA_SELECT[$tabelRasioDsnMh->unit_pengelola] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.jml_dosen') }}
                        </th>
                        <td>
                            {{ $tabelRasioDsnMh->jml_dosen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.jml_mhs') }}
                        </th>
                        <td>
                            {{ $tabelRasioDsnMh->jml_mhs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.jml_mhs_ta') }}
                        </th>
                        <td>
                            {{ $tabelRasioDsnMh->jml_mhs_ta }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-rasio-dsn-mhs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection