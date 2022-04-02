@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblReferensi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-referensis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblReferensi.fields.program_pendidikan') }}</label>
                <select class="form-control {{ $errors->has('program_pendidikan') ? 'is-invalid' : '' }}" name="program_pendidikan" id="program_pendidikan">
                    <option value disabled {{ old('program_pendidikan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblReferensi::PROGRAM_PENDIDIKAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('program_pendidikan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('program_pendidikan'))
                    <span class="text-danger">{{ $errors->first('program_pendidikan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblReferensi.fields.program_pendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banyak_lulusan_3">{{ trans('cruds.tblReferensi.fields.banyak_lulusan_3') }}</label>
                <input class="form-control {{ $errors->has('banyak_lulusan_3') ? 'is-invalid' : '' }}" type="number" name="banyak_lulusan_3" id="banyak_lulusan_3" value="{{ old('banyak_lulusan_3', '') }}" step="1">
                @if($errors->has('banyak_lulusan_3'))
                    <span class="text-danger">{{ $errors->first('banyak_lulusan_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblReferensi.fields.banyak_lulusan_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banyak_lulusan_2">{{ trans('cruds.tblReferensi.fields.banyak_lulusan_2') }}</label>
                <input class="form-control {{ $errors->has('banyak_lulusan_2') ? 'is-invalid' : '' }}" type="number" name="banyak_lulusan_2" id="banyak_lulusan_2" value="{{ old('banyak_lulusan_2', '') }}" step="1">
                @if($errors->has('banyak_lulusan_2'))
                    <span class="text-danger">{{ $errors->first('banyak_lulusan_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblReferensi.fields.banyak_lulusan_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banyak_lulusan">{{ trans('cruds.tblReferensi.fields.banyak_lulusan') }}</label>
                <input class="form-control {{ $errors->has('banyak_lulusan') ? 'is-invalid' : '' }}" type="number" name="banyak_lulusan" id="banyak_lulusan" value="{{ old('banyak_lulusan', '') }}" step="1">
                @if($errors->has('banyak_lulusan'))
                    <span class="text-danger">{{ $errors->first('banyak_lulusan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblReferensi.fields.banyak_lulusan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nilai_lulusan_3">{{ trans('cruds.tblReferensi.fields.nilai_lulusan_3') }}</label>
                <input class="form-control {{ $errors->has('nilai_lulusan_3') ? 'is-invalid' : '' }}" type="number" name="nilai_lulusan_3" id="nilai_lulusan_3" value="{{ old('nilai_lulusan_3', '') }}" step="1">
                @if($errors->has('nilai_lulusan_3'))
                    <span class="text-danger">{{ $errors->first('nilai_lulusan_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblReferensi.fields.nilai_lulusan_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nilai_lulusan_2">{{ trans('cruds.tblReferensi.fields.nilai_lulusan_2') }}</label>
                <input class="form-control {{ $errors->has('nilai_lulusan_2') ? 'is-invalid' : '' }}" type="number" name="nilai_lulusan_2" id="nilai_lulusan_2" value="{{ old('nilai_lulusan_2', '') }}" step="1">
                @if($errors->has('nilai_lulusan_2'))
                    <span class="text-danger">{{ $errors->first('nilai_lulusan_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblReferensi.fields.nilai_lulusan_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nilai_lulusan_1">{{ trans('cruds.tblReferensi.fields.nilai_lulusan_1') }}</label>
                <input class="form-control {{ $errors->has('nilai_lulusan_1') ? 'is-invalid' : '' }}" type="number" name="nilai_lulusan_1" id="nilai_lulusan_1" value="{{ old('nilai_lulusan_1', '') }}" step="1">
                @if($errors->has('nilai_lulusan_1'))
                    <span class="text-danger">{{ $errors->first('nilai_lulusan_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblReferensi.fields.nilai_lulusan_1_helper') }}</span>
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