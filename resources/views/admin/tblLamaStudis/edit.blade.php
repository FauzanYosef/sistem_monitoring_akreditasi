@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tblLamaStudi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-lama-studis.update", [$tblLamaStudi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblLamaStudi.fields.program_pendidikan') }}</label>
                <select class="form-control {{ $errors->has('program_pendidikan') ? 'is-invalid' : '' }}" name="program_pendidikan" id="program_pendidikan">
                    <option value disabled {{ old('program_pendidikan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblLamaStudi::PROGRAM_PENDIDIKAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('program_pendidikan', $tblLamaStudi->program_pendidikan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('program_pendidikan'))
                    <span class="text-danger">{{ $errors->first('program_pendidikan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLamaStudi.fields.program_pendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah_ps">{{ trans('cruds.tblLamaStudi.fields.jumlah_ps') }}</label>
                <input class="form-control {{ $errors->has('jumlah_ps') ? 'is-invalid' : '' }}" type="number" name="jumlah_ps" id="jumlah_ps" value="{{ old('jumlah_ps', $tblLamaStudi->jumlah_ps) }}" step="1">
                @if($errors->has('jumlah_ps'))
                    <span class="text-danger">{{ $errors->first('jumlah_ps') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLamaStudi.fields.jumlah_ps_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_lulusan_2">{{ trans('cruds.tblLamaStudi.fields.jml_lulusan_2') }}</label>
                <input class="form-control {{ $errors->has('jml_lulusan_2') ? 'is-invalid' : '' }}" type="number" name="jml_lulusan_2" id="jml_lulusan_2" value="{{ old('jml_lulusan_2', $tblLamaStudi->jml_lulusan_2) }}" step="1">
                @if($errors->has('jml_lulusan_2'))
                    <span class="text-danger">{{ $errors->first('jml_lulusan_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLamaStudi.fields.jml_lulusan_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_lulusan_1">{{ trans('cruds.tblLamaStudi.fields.jml_lulusan_1') }}</label>
                <input class="form-control {{ $errors->has('jml_lulusan_1') ? 'is-invalid' : '' }}" type="number" name="jml_lulusan_1" id="jml_lulusan_1" value="{{ old('jml_lulusan_1', $tblLamaStudi->jml_lulusan_1) }}" step="1">
                @if($errors->has('jml_lulusan_1'))
                    <span class="text-danger">{{ $errors->first('jml_lulusan_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLamaStudi.fields.jml_lulusan_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_lulusan">{{ trans('cruds.tblLamaStudi.fields.jml_lulusan') }}</label>
                <input class="form-control {{ $errors->has('jml_lulusan') ? 'is-invalid' : '' }}" type="number" name="jml_lulusan" id="jml_lulusan" value="{{ old('jml_lulusan', $tblLamaStudi->jml_lulusan) }}" step="1">
                @if($errors->has('jml_lulusan'))
                    <span class="text-danger">{{ $errors->first('jml_lulusan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLamaStudi.fields.jml_lulusan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="average_masa_2">{{ trans('cruds.tblLamaStudi.fields.average_masa_2') }}</label>
                <input class="form-control {{ $errors->has('average_masa_2') ? 'is-invalid' : '' }}" type="number" name="average_masa_2" id="average_masa_2" value="{{ old('average_masa_2', $tblLamaStudi->average_masa_2) }}" step="0.01">
                @if($errors->has('average_masa_2'))
                    <span class="text-danger">{{ $errors->first('average_masa_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLamaStudi.fields.average_masa_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="average_masa_1">{{ trans('cruds.tblLamaStudi.fields.average_masa_1') }}</label>
                <input class="form-control {{ $errors->has('average_masa_1') ? 'is-invalid' : '' }}" type="number" name="average_masa_1" id="average_masa_1" value="{{ old('average_masa_1', $tblLamaStudi->average_masa_1) }}" step="0.01">
                @if($errors->has('average_masa_1'))
                    <span class="text-danger">{{ $errors->first('average_masa_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLamaStudi.fields.average_masa_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="average_masa">{{ trans('cruds.tblLamaStudi.fields.average_masa') }}</label>
                <input class="form-control {{ $errors->has('average_masa') ? 'is-invalid' : '' }}" type="number" name="average_masa" id="average_masa" value="{{ old('average_masa', $tblLamaStudi->average_masa) }}" step="0.01">
                @if($errors->has('average_masa'))
                    <span class="text-danger">{{ $errors->first('average_masa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLamaStudi.fields.average_masa_helper') }}</span>
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