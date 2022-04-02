@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblPublikasiIlmiah.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-publikasi-ilmiahs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblPublikasiIlmiah.fields.jenis_publikasi') }}</label>
                <select class="form-control {{ $errors->has('jenis_publikasi') ? 'is-invalid' : '' }}" name="jenis_publikasi" id="jenis_publikasi">
                    <option value disabled {{ old('jenis_publikasi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblPublikasiIlmiah::JENIS_PUBLIKASI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_publikasi', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_publikasi'))
                    <span class="text-danger">{{ $errors->first('jenis_publikasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPublikasiIlmiah.fields.jenis_publikasi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_judul_1">{{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_1') }}</label>
                <input class="form-control {{ $errors->has('jml_judul_1') ? 'is-invalid' : '' }}" type="number" name="jml_judul_1" id="jml_judul_1" value="{{ old('jml_judul_1', '') }}" step="1">
                @if($errors->has('jml_judul_1'))
                    <span class="text-danger">{{ $errors->first('jml_judul_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_judul_2">{{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_2') }}</label>
                <input class="form-control {{ $errors->has('jml_judul_2') ? 'is-invalid' : '' }}" type="number" name="jml_judul_2" id="jml_judul_2" value="{{ old('jml_judul_2', '') }}" step="1">
                @if($errors->has('jml_judul_2'))
                    <span class="text-danger">{{ $errors->first('jml_judul_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_judul_3">{{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_3') }}</label>
                <input class="form-control {{ $errors->has('jml_judul_3') ? 'is-invalid' : '' }}" type="number" name="jml_judul_3" id="jml_judul_3" value="{{ old('jml_judul_3', '') }}" step="1">
                @if($errors->has('jml_judul_3'))
                    <span class="text-danger">{{ $errors->first('jml_judul_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah">{{ trans('cruds.tblPublikasiIlmiah.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" step="1">
                @if($errors->has('jumlah'))
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPublikasiIlmiah.fields.jumlah_helper') }}</span>
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