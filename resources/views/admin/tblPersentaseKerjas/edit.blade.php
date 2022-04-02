@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tblPersentaseKerja.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-persentase-kerjas.update", [$tblPersentaseKerja->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblPersentaseKerja.fields.program_pendidikan') }}</label>
                <select class="form-control {{ $errors->has('program_pendidikan') ? 'is-invalid' : '' }}" name="program_pendidikan" id="program_pendidikan">
                    <option value disabled {{ old('program_pendidikan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblPersentaseKerja::PROGRAM_PENDIDIKAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('program_pendidikan', $tblPersentaseKerja->program_pendidikan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('program_pendidikan'))
                    <span class="text-danger">{{ $errors->first('program_pendidikan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPersentaseKerja.fields.program_pendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="persen_4">{{ trans('cruds.tblPersentaseKerja.fields.persen_4') }}</label>
                <input class="form-control {{ $errors->has('persen_4') ? 'is-invalid' : '' }}" type="number" name="persen_4" id="persen_4" value="{{ old('persen_4', $tblPersentaseKerja->persen_4) }}" step="0.01">
                @if($errors->has('persen_4'))
                    <span class="text-danger">{{ $errors->first('persen_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPersentaseKerja.fields.persen_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="persen_3">{{ trans('cruds.tblPersentaseKerja.fields.persen_3') }}</label>
                <input class="form-control {{ $errors->has('persen_3') ? 'is-invalid' : '' }}" type="number" name="persen_3" id="persen_3" value="{{ old('persen_3', $tblPersentaseKerja->persen_3) }}" step="0.01">
                @if($errors->has('persen_3'))
                    <span class="text-danger">{{ $errors->first('persen_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPersentaseKerja.fields.persen_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="persen_2">{{ trans('cruds.tblPersentaseKerja.fields.persen_2') }}</label>
                <input class="form-control {{ $errors->has('persen_2') ? 'is-invalid' : '' }}" type="number" name="persen_2" id="persen_2" value="{{ old('persen_2', $tblPersentaseKerja->persen_2) }}" step="0.01">
                @if($errors->has('persen_2'))
                    <span class="text-danger">{{ $errors->first('persen_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPersentaseKerja.fields.persen_2_helper') }}</span>
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