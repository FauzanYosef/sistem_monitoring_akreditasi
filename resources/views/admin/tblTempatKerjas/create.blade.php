@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblTempatKerja.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-tempat-kerjas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblTempatKerja.fields.program_pendidikan') }}</label>
                <select class="form-control {{ $errors->has('program_pendidikan') ? 'is-invalid' : '' }}" name="program_pendidikan" id="program_pendidikan">
                    <option value disabled {{ old('program_pendidikan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblTempatKerja::PROGRAM_PENDIDIKAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('program_pendidikan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('program_pendidikan'))
                    <span class="text-danger">{{ $errors->first('program_pendidikan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblTempatKerja.fields.program_pendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_lulusan">{{ trans('cruds.tblTempatKerja.fields.jml_lulusan') }}</label>
                <input class="form-control {{ $errors->has('jml_lulusan') ? 'is-invalid' : '' }}" type="number" name="jml_lulusan" id="jml_lulusan" value="{{ old('jml_lulusan', '') }}" step="1">
                @if($errors->has('jml_lulusan'))
                    <span class="text-danger">{{ $errors->first('jml_lulusan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblTempatKerja.fields.jml_lulusan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tingkat_1">{{ trans('cruds.tblTempatKerja.fields.tingkat_1') }}</label>
                <input class="form-control {{ $errors->has('tingkat_1') ? 'is-invalid' : '' }}" type="number" name="tingkat_1" id="tingkat_1" value="{{ old('tingkat_1', '') }}" step="1">
                @if($errors->has('tingkat_1'))
                    <span class="text-danger">{{ $errors->first('tingkat_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblTempatKerja.fields.tingkat_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tingkat_2">{{ trans('cruds.tblTempatKerja.fields.tingkat_2') }}</label>
                <input class="form-control {{ $errors->has('tingkat_2') ? 'is-invalid' : '' }}" type="number" name="tingkat_2" id="tingkat_2" value="{{ old('tingkat_2', '') }}" step="1">
                @if($errors->has('tingkat_2'))
                    <span class="text-danger">{{ $errors->first('tingkat_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblTempatKerja.fields.tingkat_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tingkat_3">{{ trans('cruds.tblTempatKerja.fields.tingkat_3') }}</label>
                <input class="form-control {{ $errors->has('tingkat_3') ? 'is-invalid' : '' }}" type="number" name="tingkat_3" id="tingkat_3" value="{{ old('tingkat_3', '') }}" step="1">
                @if($errors->has('tingkat_3'))
                    <span class="text-danger">{{ $errors->first('tingkat_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblTempatKerja.fields.tingkat_3_helper') }}</span>
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