@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelRekognisiDosen.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-rekognisi-dosens.update", [$tabelRekognisiDosen->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama_dosen">{{ trans('cruds.tabelRekognisiDosen.fields.nama_dosen') }}</label>
                <input class="form-control {{ $errors->has('nama_dosen') ? 'is-invalid' : '' }}" type="text" name="nama_dosen" id="nama_dosen" value="{{ old('nama_dosen', $tabelRekognisiDosen->nama_dosen) }}">
                @if($errors->has('nama_dosen'))
                    <span class="text-danger">{{ $errors->first('nama_dosen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelRekognisiDosen.fields.nama_dosen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keahlian">{{ trans('cruds.tabelRekognisiDosen.fields.keahlian') }}</label>
                <input class="form-control {{ $errors->has('keahlian') ? 'is-invalid' : '' }}" type="text" name="keahlian" id="keahlian" value="{{ old('keahlian', $tabelRekognisiDosen->keahlian) }}">
                @if($errors->has('keahlian'))
                    <span class="text-danger">{{ $errors->first('keahlian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelRekognisiDosen.fields.keahlian_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rekognisi">{{ trans('cruds.tabelRekognisiDosen.fields.rekognisi') }}</label>
                <textarea class="form-control {{ $errors->has('rekognisi') ? 'is-invalid' : '' }}" name="rekognisi" id="rekognisi">{{ old('rekognisi', $tabelRekognisiDosen->rekognisi) }}</textarea>
                @if($errors->has('rekognisi'))
                    <span class="text-danger">{{ $errors->first('rekognisi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelRekognisiDosen.fields.rekognisi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tahun">{{ trans('cruds.tabelRekognisiDosen.fields.tahun') }}</label>
                <input class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="text" name="tahun" id="tahun" value="{{ old('tahun', $tabelRekognisiDosen->tahun) }}">
                @if($errors->has('tahun'))
                    <span class="text-danger">{{ $errors->first('tahun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelRekognisiDosen.fields.tahun_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection