@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tblRasioLulu.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-rasio-lulus.update", [$tblRasioLulu->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblRasioLulu.fields.prodi') }}</label>
                <select class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }}" name="prodi" id="prodi">
                    <option value disabled {{ old('prodi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblRasioLulu::PRODI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('prodi', $tblRasioLulu->prodi) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('prodi'))
                    <span class="text-danger">{{ $errors->first('prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tblRasioLulu.fields.tahun_masuk') }}</label>
                <select class="form-control {{ $errors->has('tahun_masuk') ? 'is-invalid' : '' }}" name="tahun_masuk" id="tahun_masuk">
                    <option value disabled {{ old('tahun_masuk', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblRasioLulu::TAHUN_MASUK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tahun_masuk', $tblRasioLulu->tahun_masuk) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tahun_masuk'))
                    <span class="text-danger">{{ $errors->first('tahun_masuk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.tahun_masuk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_6">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_6') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_6') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_6" id="jml_mhs_6" value="{{ old('jml_mhs_6', $tblRasioLulu->jml_mhs_6) }}" step="1">
                @if($errors->has('jml_mhs_6'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_5">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_5') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_5') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_5" id="jml_mhs_5" value="{{ old('jml_mhs_5', $tblRasioLulu->jml_mhs_5) }}" step="1">
                @if($errors->has('jml_mhs_5'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_4">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_4') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_4') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_4" id="jml_mhs_4" value="{{ old('jml_mhs_4', $tblRasioLulu->jml_mhs_4) }}" step="1">
                @if($errors->has('jml_mhs_4'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_3">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_3') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_3') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_3" id="jml_mhs_3" value="{{ old('jml_mhs_3', $tblRasioLulu->jml_mhs_3) }}" step="1">
                @if($errors->has('jml_mhs_3'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_2">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_2') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_2') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_2" id="jml_mhs_2" value="{{ old('jml_mhs_2', $tblRasioLulu->jml_mhs_2) }}" step="1">
                @if($errors->has('jml_mhs_2'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_1">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_1') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_1') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_1" id="jml_mhs_1" value="{{ old('jml_mhs_1', $tblRasioLulu->jml_mhs_1) }}" step="1">
                @if($errors->has('jml_mhs_1'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs">{{ trans('cruds.tblRasioLulu.fields.jml_mhs') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs') ? 'is-invalid' : '' }}" type="number" name="jml_mhs" id="jml_mhs" value="{{ old('jml_mhs', $tblRasioLulu->jml_mhs) }}" step="1">
                @if($errors->has('jml_mhs'))
                    <span class="text-danger">{{ $errors->first('jml_mhs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.jml_mhs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_lulusan">{{ trans('cruds.tblRasioLulu.fields.jml_lulusan') }}</label>
                <input class="form-control {{ $errors->has('jml_lulusan') ? 'is-invalid' : '' }}" type="number" name="jml_lulusan" id="jml_lulusan" value="{{ old('jml_lulusan', $tblRasioLulu->jml_lulusan) }}" step="1">
                @if($errors->has('jml_lulusan'))
                    <span class="text-danger">{{ $errors->first('jml_lulusan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRasioLulu.fields.jml_lulusan_helper') }}</span>
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