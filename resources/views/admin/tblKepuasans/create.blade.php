@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblKepuasan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-kepuasans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblKepuasan.fields.aspek_penilaian') }}</label>
                <select class="form-control {{ $errors->has('aspek_penilaian') ? 'is-invalid' : '' }}" name="aspek_penilaian" id="aspek_penilaian">
                    <option value disabled {{ old('aspek_penilaian', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblKepuasan::ASPEK_PENILAIAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('aspek_penilaian', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('aspek_penilaian'))
                    <span class="text-danger">{{ $errors->first('aspek_penilaian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.aspek_penilaian_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil_penilaian_4">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_4') }}</label>
                <input class="form-control {{ $errors->has('hasil_penilaian_4') ? 'is-invalid' : '' }}" type="number" name="hasil_penilaian_4" id="hasil_penilaian_4" value="{{ old('hasil_penilaian_4', '') }}" step="0.01">
                @if($errors->has('hasil_penilaian_4'))
                    <span class="text-danger">{{ $errors->first('hasil_penilaian_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil_penilaian_3">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_3') }}</label>
                <input class="form-control {{ $errors->has('hasil_penilaian_3') ? 'is-invalid' : '' }}" type="number" name="hasil_penilaian_3" id="hasil_penilaian_3" value="{{ old('hasil_penilaian_3', '') }}" step="0.01">
                @if($errors->has('hasil_penilaian_3'))
                    <span class="text-danger">{{ $errors->first('hasil_penilaian_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil_penilaian_2">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_2') }}</label>
                <input class="form-control {{ $errors->has('hasil_penilaian_2') ? 'is-invalid' : '' }}" type="number" name="hasil_penilaian_2" id="hasil_penilaian_2" value="{{ old('hasil_penilaian_2', '') }}" step="0.01">
                @if($errors->has('hasil_penilaian_2'))
                    <span class="text-danger">{{ $errors->first('hasil_penilaian_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil_penilaian">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian') }}</label>
                <input class="form-control {{ $errors->has('hasil_penilaian') ? 'is-invalid' : '' }}" type="number" name="hasil_penilaian" id="hasil_penilaian" value="{{ old('hasil_penilaian', '') }}" step="0.01">
                @if($errors->has('hasil_penilaian'))
                    <span class="text-danger">{{ $errors->first('hasil_penilaian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblKepuasan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-kepuasans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblKepuasan.fields.aspek_penilaian') }}</label>
                <select class="form-control {{ $errors->has('aspek_penilaian') ? 'is-invalid' : '' }}" name="aspek_penilaian" id="aspek_penilaian">
                    <option value disabled {{ old('aspek_penilaian', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblKepuasan::ASPEK_PENILAIAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('aspek_penilaian', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('aspek_penilaian'))
                    <span class="text-danger">{{ $errors->first('aspek_penilaian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.aspek_penilaian_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil_penilaian_4">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_4') }}</label>
                <input class="form-control {{ $errors->has('hasil_penilaian_4') ? 'is-invalid' : '' }}" type="number" name="hasil_penilaian_4" id="hasil_penilaian_4" value="{{ old('hasil_penilaian_4', '') }}" step="0.01">
                @if($errors->has('hasil_penilaian_4'))
                    <span class="text-danger">{{ $errors->first('hasil_penilaian_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil_penilaian_3">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_3') }}</label>
                <input class="form-control {{ $errors->has('hasil_penilaian_3') ? 'is-invalid' : '' }}" type="number" name="hasil_penilaian_3" id="hasil_penilaian_3" value="{{ old('hasil_penilaian_3', '') }}" step="0.01">
                @if($errors->has('hasil_penilaian_3'))
                    <span class="text-danger">{{ $errors->first('hasil_penilaian_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil_penilaian_2">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_2') }}</label>
                <input class="form-control {{ $errors->has('hasil_penilaian_2') ? 'is-invalid' : '' }}" type="number" name="hasil_penilaian_2" id="hasil_penilaian_2" value="{{ old('hasil_penilaian_2', '') }}" step="0.01">
                @if($errors->has('hasil_penilaian_2'))
                    <span class="text-danger">{{ $errors->first('hasil_penilaian_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hasil_penilaian">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian') }}</label>
                <input class="form-control {{ $errors->has('hasil_penilaian') ? 'is-invalid' : '' }}" type="number" name="hasil_penilaian" id="hasil_penilaian" value="{{ old('hasil_penilaian', '') }}" step="0.01">
                @if($errors->has('hasil_penilaian'))
                    <span class="text-danger">{{ $errors->first('hasil_penilaian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblKepuasan.fields.hasil_penilaian_helper') }}</span>
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