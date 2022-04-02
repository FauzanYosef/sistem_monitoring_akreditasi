@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelJabatanDosen.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-jabatan-dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelJabatanDosen.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelJabatanDosen->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelJabatanDosen.fields.pendidikan') }}
                        </th>
                        <td>
                            {{ App\Models\TabelJabatanDosen::PENDIDIKAN_SELECT[$tabelJabatanDosen->pendidikan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelJabatanDosen.fields.gr_besar') }}
                        </th>
                        <td>
                            {{ $tabelJabatanDosen->gr_besar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelJabatanDosen.fields.lektor_kepala') }}
                        </th>
                        <td>
                            {{ $tabelJabatanDosen->lektor_kepala }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelJabatanDosen.fields.lektor') }}
                        </th>
                        <td>
                            {{ $tabelJabatanDosen->lektor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelJabatanDosen.fields.asisten_ahli') }}
                        </th>
                        <td>
                            {{ $tabelJabatanDosen->asisten_ahli }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelJabatanDosen.fields.tenaga_pengajar') }}
                        </th>
                        <td>
                            {{ $tabelJabatanDosen->tenaga_pengajar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelJabatanDosen.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $tabelJabatanDosen->jumlah }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-jabatan-dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection