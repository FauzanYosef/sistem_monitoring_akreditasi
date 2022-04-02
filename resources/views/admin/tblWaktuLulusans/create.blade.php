@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblWaktuLulusan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-waktu-lulusans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblWaktuLulusan.fields.program_pendidikan') }}</label>
                <select class="form-control {{ $errors->has('program_pendidikan') ? 'is-invalid' : '' }}" name="program_pendidikan" id="program_pendidikan">
                    <option value disabled {{ old('program_pendidikan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblWaktuLulusan::PROGRAM_PENDIDIKAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('program_pendidikan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('program_pendidikan'))
                    <span class="text-danger">{{ $errors->first('program_pendidikan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblWaktuLulusan.fields.program_pendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="average_tunggu_4">{{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_4') }}</label>
                <input class="form-control {{ $errors->has('average_tunggu_4') ? 'is-invalid' : '' }}" type="number" name="average_tunggu_4" id="average_tunggu_4" value="{{ old('average_tunggu_4', '') }}" step="0.01">
                @if($errors->has('average_tunggu_4'))
                    <span class="text-danger">{{ $errors->first('average_tunggu_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="average_tunggu_3">{{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_3') }}</label>
                <input class="form-control {{ $errors->has('average_tunggu_3') ? 'is-invalid' : '' }}" type="number" name="average_tunggu_3" id="average_tunggu_3" value="{{ old('average_tunggu_3', '') }}" step="0.01">
                @if($errors->has('average_tunggu_3'))
                    <span class="text-danger">{{ $errors->first('average_tunggu_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="average_tunggu_2">{{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_2') }}</label>
                <input class="form-control {{ $errors->has('average_tunggu_2') ? 'is-invalid' : '' }}" type="number" name="average_tunggu_2" id="average_tunggu_2" value="{{ old('average_tunggu_2', '') }}" step="0.01">
                @if($errors->has('average_tunggu_2'))
                    <span class="text-danger">{{ $errors->first('average_tunggu_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_2_helper') }}</span>
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