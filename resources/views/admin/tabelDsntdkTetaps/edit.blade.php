@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelDsntdkTetap.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-dsntdk-tetaps.update", [$tabelDsntdkTetap->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tabelDsntdkTetap.fields.pendidikan') }}</label>
                <select class="form-control {{ $errors->has('pendidikan') ? 'is-invalid' : '' }}" name="pendidikan" id="pendidikan">
                    <option value disabled {{ old('pendidikan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelDsntdkTetap::PENDIDIKAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('pendidikan', $tabelDsntdkTetap->pendidikan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('pendidikan'))
                    <span class="text-danger">{{ $errors->first('pendidikan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelDsntdkTetap.fields.pendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guru_besar">{{ trans('cruds.tabelDsntdkTetap.fields.guru_besar') }}</label>
                <input class="form-control {{ $errors->has('guru_besar') ? 'is-invalid' : '' }}" type="number" name="guru_besar" id="guru_besar" value="{{ old('guru_besar', $tabelDsntdkTetap->guru_besar) }}" step="1">
                @if($errors->has('guru_besar'))
                    <span class="text-danger">{{ $errors->first('guru_besar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelDsntdkTetap.fields.guru_besar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lektor_kepala">{{ trans('cruds.tabelDsntdkTetap.fields.lektor_kepala') }}</label>
                <input class="form-control {{ $errors->has('lektor_kepala') ? 'is-invalid' : '' }}" type="number" name="lektor_kepala" id="lektor_kepala" value="{{ old('lektor_kepala', $tabelDsntdkTetap->lektor_kepala) }}" step="1">
                @if($errors->has('lektor_kepala'))
                    <span class="text-danger">{{ $errors->first('lektor_kepala') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelDsntdkTetap.fields.lektor_kepala_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lektor">{{ trans('cruds.tabelDsntdkTetap.fields.lektor') }}</label>
                <input class="form-control {{ $errors->has('lektor') ? 'is-invalid' : '' }}" type="number" name="lektor" id="lektor" value="{{ old('lektor', $tabelDsntdkTetap->lektor) }}" step="1">
                @if($errors->has('lektor'))
                    <span class="text-danger">{{ $errors->first('lektor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelDsntdkTetap.fields.lektor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="asisten_ahli">{{ trans('cruds.tabelDsntdkTetap.fields.asisten_ahli') }}</label>
                <input class="form-control {{ $errors->has('asisten_ahli') ? 'is-invalid' : '' }}" type="number" name="asisten_ahli" id="asisten_ahli" value="{{ old('asisten_ahli', $tabelDsntdkTetap->asisten_ahli) }}" step="1">
                @if($errors->has('asisten_ahli'))
                    <span class="text-danger">{{ $errors->first('asisten_ahli') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelDsntdkTetap.fields.asisten_ahli_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tenaga_pengajar">{{ trans('cruds.tabelDsntdkTetap.fields.tenaga_pengajar') }}</label>
                <input class="form-control {{ $errors->has('tenaga_pengajar') ? 'is-invalid' : '' }}" type="number" name="tenaga_pengajar" id="tenaga_pengajar" value="{{ old('tenaga_pengajar', $tabelDsntdkTetap->tenaga_pengajar) }}" step="1">
                @if($errors->has('tenaga_pengajar'))
                    <span class="text-danger">{{ $errors->first('tenaga_pengajar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelDsntdkTetap.fields.tenaga_pengajar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah">{{ trans('cruds.tabelDsntdkTetap.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $tabelDsntdkTetap->jumlah) }}" step="1">
                @if($errors->has('jumlah'))
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelDsntdkTetap.fields.jumlah_helper') }}</span>
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