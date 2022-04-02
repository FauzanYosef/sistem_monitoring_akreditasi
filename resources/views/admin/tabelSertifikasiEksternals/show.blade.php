@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelSertifikasiEksternal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-sertifikasi-eksternals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelSertifikasiEksternal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.lembaga_akreditasi') }}
                        </th>
                        <td>
                            {{ $tabelSertifikasiEksternal->lembaga_akreditasi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.jenis_akreditasi') }}
                        </th>
                        <td>
                            {{ $tabelSertifikasiEksternal->jenis_akreditasi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.lingkup') }}
                        </th>
                        <td>
                            {{ App\Models\TabelSertifikasiEksternal::LINGKUP_SELECT[$tabelSertifikasiEksternal->lingkup] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.tingkat') }}
                        </th>
                        <td>
                            {{ App\Models\TabelSertifikasiEksternal::TINGKAT_SELECT[$tabelSertifikasiEksternal->tingkat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.masa_berlaku') }}
                        </th>
                        <td>
                            {{ $tabelSertifikasiEksternal->masa_berlaku }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $tabelSertifikasiEksternal->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-sertifikasi-eksternals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection