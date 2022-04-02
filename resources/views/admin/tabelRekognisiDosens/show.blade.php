@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelRekognisiDosen.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-rekognisi-dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRekognisiDosen.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelRekognisiDosen->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRekognisiDosen.fields.nama_dosen') }}
                        </th>
                        <td>
                            {{ $tabelRekognisiDosen->nama_dosen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRekognisiDosen.fields.keahlian') }}
                        </th>
                        <td>
                            {{ $tabelRekognisiDosen->keahlian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRekognisiDosen.fields.rekognisi') }}
                        </th>
                        <td>
                            {{ $tabelRekognisiDosen->rekognisi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelRekognisiDosen.fields.tahun') }}
                        </th>
                        <td>
                            {{ $tabelRekognisiDosen->tahun }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-rekognisi-dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection