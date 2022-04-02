@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblPerolehanDana.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-perolehan-danas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblPerolehanDana.fields.sumber_dana') }}</label>
                <select class="form-control {{ $errors->has('sumber_dana') ? 'is-invalid' : '' }}" name="sumber_dana" id="sumber_dana">
                    <option value disabled {{ old('sumber_dana', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblPerolehanDana::SUMBER_DANA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sumber_dana', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sumber_dana'))
                    <span class="text-danger">{{ $errors->first('sumber_dana') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPerolehanDana.fields.sumber_dana_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jenis_dana">{{ trans('cruds.tblPerolehanDana.fields.jenis_dana') }}</label>
                <input class="form-control {{ $errors->has('jenis_dana') ? 'is-invalid' : '' }}" type="text" name="jenis_dana" id="jenis_dana" value="{{ old('jenis_dana', '') }}">
                @if($errors->has('jenis_dana'))
                    <span class="text-danger">{{ $errors->first('jenis_dana') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPerolehanDana.fields.jenis_dana_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_ts_2">{{ trans('cruds.tblPerolehanDana.fields.jml_ts_2') }}</label>
                <input class="form-control {{ $errors->has('jml_ts_2') ? 'is-invalid' : '' }}" type="number" name="jml_ts_2" id="jml_ts_2" value="{{ old('jml_ts_2', '') }}" step="0.01">
                @if($errors->has('jml_ts_2'))
                    <span class="text-danger">{{ $errors->first('jml_ts_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPerolehanDana.fields.jml_ts_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_dana_ts_1">{{ trans('cruds.tblPerolehanDana.fields.jml_dana_ts_1') }}</label>
                <input class="form-control {{ $errors->has('jml_dana_ts_1') ? 'is-invalid' : '' }}" type="number" name="jml_dana_ts_1" id="jml_dana_ts_1" value="{{ old('jml_dana_ts_1', '') }}" step="0.01">
                @if($errors->has('jml_dana_ts_1'))
                    <span class="text-danger">{{ $errors->first('jml_dana_ts_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPerolehanDana.fields.jml_dana_ts_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_dana_ts">{{ trans('cruds.tblPerolehanDana.fields.jml_dana_ts') }}</label>
                <input class="form-control {{ $errors->has('jml_dana_ts') ? 'is-invalid' : '' }}" type="number" name="jml_dana_ts" id="jml_dana_ts" value="{{ old('jml_dana_ts', '') }}" step="0.01">
                @if($errors->has('jml_dana_ts'))
                    <span class="text-danger">{{ $errors->first('jml_dana_ts') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPerolehanDana.fields.jml_dana_ts_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml">{{ trans('cruds.tblPerolehanDana.fields.jml') }}</label>
                <input class="form-control {{ $errors->has('jml') ? 'is-invalid' : '' }}" type="number" name="jml" id="jml" value="{{ old('jml', '') }}" step="0.01">
                @if($errors->has('jml'))
                    <span class="text-danger">{{ $errors->first('jml') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPerolehanDana.fields.jml_helper') }}</span>
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