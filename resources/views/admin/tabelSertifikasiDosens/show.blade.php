@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelSertifikasiDosen.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-sertifikasi-dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiDosen.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelSertifikasiDosen->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiDosen.fields.unit_pengelola') }}
                        </th>
                        <td>
                            {{ App\Models\TabelSertifikasiDosen::UNIT_PENGELOLA_SELECT[$tabelSertifikasiDosen->unit_pengelola] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiDosen.fields.jml_dosen') }}
                        </th>
                        <td>
                            {{ $tabelSertifikasiDosen->jml_dosen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelSertifikasiDosen.fields.jml_dosen_sertifikat') }}
                        </th>
                        <td>
                            {{ $tabelSertifikasiDosen->jml_dosen_sertifikat }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-sertifikasi-dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection