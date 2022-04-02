@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tblRefPenilaian.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-ref-penilaians.update", [$tblRefPenilaian->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblRefPenilaian.fields.program_pendidikan') }}</label>
                <select class="form-control {{ $errors->has('program_pendidikan') ? 'is-invalid' : '' }}" name="program_pendidikan" id="program_pendidikan">
                    <option value disabled {{ old('program_pendidikan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblRefPenilaian::PROGRAM_PENDIDIKAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('program_pendidikan', $tblRefPenilaian->program_pendidikan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('program_pendidikan'))
                    <span class="text-danger">{{ $errors->first('program_pendidikan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRefPenilaian.fields.program_pendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_lulusan_4">{{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_4') }}</label>
                <input class="form-control {{ $errors->has('jml_lulusan_4') ? 'is-invalid' : '' }}" type="number" name="jml_lulusan_4" id="jml_lulusan_4" value="{{ old('jml_lulusan_4', $tblRefPenilaian->jml_lulusan_4) }}" step="1">
                @if($errors->has('jml_lulusan_4'))
                    <span class="text-danger">{{ $errors->first('jml_lulusan_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_lulusan_3">{{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_3') }}</label>
                <input class="form-control {{ $errors->has('jml_lulusan_3') ? 'is-invalid' : '' }}" type="number" name="jml_lulusan_3" id="jml_lulusan_3" value="{{ old('jml_lulusan_3', $tblRefPenilaian->jml_lulusan_3) }}" step="1">
                @if($errors->has('jml_lulusan_3'))
                    <span class="text-danger">{{ $errors->first('jml_lulusan_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_lulusan">{{ trans('cruds.tblRefPenilaian.fields.jml_lulusan') }}</label>
                <input class="form-control {{ $errors->has('jml_lulusan') ? 'is-invalid' : '' }}" type="number" name="jml_lulusan" id="jml_lulusan" value="{{ old('jml_lulusan', $tblRefPenilaian->jml_lulusan) }}" step="1">
                @if($errors->has('jml_lulusan'))
                    <span class="text-danger">{{ $errors->first('jml_lulusan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jwb_lulusan_4">{{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_4') }}</label>
                <input class="form-control {{ $errors->has('jwb_lulusan_4') ? 'is-invalid' : '' }}" type="number" name="jwb_lulusan_4" id="jwb_lulusan_4" value="{{ old('jwb_lulusan_4', $tblRefPenilaian->jwb_lulusan_4) }}" step="1">
                @if($errors->has('jwb_lulusan_4'))
                    <span class="text-danger">{{ $errors->first('jwb_lulusan_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jwb_lulusan_3">{{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_3') }}</label>
                <input class="form-control {{ $errors->has('jwb_lulusan_3') ? 'is-invalid' : '' }}" type="number" name="jwb_lulusan_3" id="jwb_lulusan_3" value="{{ old('jwb_lulusan_3', $tblRefPenilaian->jwb_lulusan_3) }}" step="1">
                @if($errors->has('jwb_lulusan_3'))
                    <span class="text-danger">{{ $errors->first('jwb_lulusan_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jwb_lulusan_2">{{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_2') }}</label>
                <input class="form-control {{ $errors->has('jwb_lulusan_2') ? 'is-invalid' : '' }}" type="number" name="jwb_lulusan_2" id="jwb_lulusan_2" value="{{ old('jwb_lulusan_2', $tblRefPenilaian->jwb_lulusan_2) }}" step="1">
                @if($errors->has('jwb_lulusan_2'))
                    <span class="text-danger">{{ $errors->first('jwb_lulusan_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_2_helper') }}</span>
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