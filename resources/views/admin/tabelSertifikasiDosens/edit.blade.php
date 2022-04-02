@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelSertifikasiDosen.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-sertifikasi-dosens.update", [$tabelSertifikasiDosen->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tabelSertifikasiDosen.fields.unit_pengelola') }}</label>
                <select class="form-control {{ $errors->has('unit_pengelola') ? 'is-invalid' : '' }}" name="unit_pengelola" id="unit_pengelola">
                    <option value disabled {{ old('unit_pengelola', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelSertifikasiDosen::UNIT_PENGELOLA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('unit_pengelola', $tabelSertifikasiDosen->unit_pengelola) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit_pengelola'))
                    <span class="text-danger">{{ $errors->first('unit_pengelola') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiDosen.fields.unit_pengelola_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_dosen">{{ trans('cruds.tabelSertifikasiDosen.fields.jml_dosen') }}</label>
                <input class="form-control {{ $errors->has('jml_dosen') ? 'is-invalid' : '' }}" type="number" name="jml_dosen" id="jml_dosen" value="{{ old('jml_dosen', $tabelSertifikasiDosen->jml_dosen) }}" step="1">
                @if($errors->has('jml_dosen'))
                    <span class="text-danger">{{ $errors->first('jml_dosen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiDosen.fields.jml_dosen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_dosen_sertifikat">{{ trans('cruds.tabelSertifikasiDosen.fields.jml_dosen_sertifikat') }}</label>
                <input class="form-control {{ $errors->has('jml_dosen_sertifikat') ? 'is-invalid' : '' }}" type="number" name="jml_dosen_sertifikat" id="jml_dosen_sertifikat" value="{{ old('jml_dosen_sertifikat', $tabelSertifikasiDosen->jml_dosen_sertifikat) }}" step="1">
                @if($errors->has('jml_dosen_sertifikat'))
                    <span class="text-danger">{{ $errors->first('jml_dosen_sertifikat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiDosen.fields.jml_dosen_sertifikat_helper') }}</span>
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