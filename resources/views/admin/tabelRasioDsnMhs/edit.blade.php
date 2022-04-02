@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelRasioDsnMh.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-rasio-dsn-mhs.update", [$tabelRasioDsnMh->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tabelRasioDsnMh.fields.unit_pengelola') }}</label>
                <select class="form-control {{ $errors->has('unit_pengelola') ? 'is-invalid' : '' }}" name="unit_pengelola" id="unit_pengelola">
                    <option value disabled {{ old('unit_pengelola', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelRasioDsnMh::UNIT_PENGELOLA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('unit_pengelola', $tabelRasioDsnMh->unit_pengelola) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit_pengelola'))
                    <span class="text-danger">{{ $errors->first('unit_pengelola') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelRasioDsnMh.fields.unit_pengelola_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_dosen">{{ trans('cruds.tabelRasioDsnMh.fields.jml_dosen') }}</label>
                <input class="form-control {{ $errors->has('jml_dosen') ? 'is-invalid' : '' }}" type="number" name="jml_dosen" id="jml_dosen" value="{{ old('jml_dosen', $tabelRasioDsnMh->jml_dosen) }}" step="1">
                @if($errors->has('jml_dosen'))
                    <span class="text-danger">{{ $errors->first('jml_dosen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelRasioDsnMh.fields.jml_dosen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs">{{ trans('cruds.tabelRasioDsnMh.fields.jml_mhs') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs') ? 'is-invalid' : '' }}" type="number" name="jml_mhs" id="jml_mhs" value="{{ old('jml_mhs', $tabelRasioDsnMh->jml_mhs) }}" step="1">
                @if($errors->has('jml_mhs'))
                    <span class="text-danger">{{ $errors->first('jml_mhs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelRasioDsnMh.fields.jml_mhs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_ta">{{ trans('cruds.tabelRasioDsnMh.fields.jml_mhs_ta') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_ta') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_ta" id="jml_mhs_ta" value="{{ old('jml_mhs_ta', $tabelRasioDsnMh->jml_mhs_ta) }}" step="1">
                @if($errors->has('jml_mhs_ta'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_ta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelRasioDsnMh.fields.jml_mhs_ta_helper') }}</span>
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