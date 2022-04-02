@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelAkreditasiProdi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-akreditasi-prodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelAkreditasiProdi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.lembaga_akreditasi_internasional') }}
                        </th>
                        <td>
                            {{ $tabelAkreditasiProdi->lembaga_akreditasi_internasional }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.prodi') }}
                        </th>
                        <td>
                            {{ $tabelAkreditasiProdi->prodi->nama_prodi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.peringkat') }}
                        </th>
                        <td>
                            {{ App\Models\TabelAkreditasiProdi::PERINGKAT_SELECT[$tabelAkreditasiProdi->peringkat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.masa_berlaku') }}
                        </th>
                        <td>
                            {{ $tabelAkreditasiProdi->masa_berlaku }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $tabelAkreditasiProdi->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-akreditasi-prodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection