@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelPkmDsn.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-pkm-dsns.update", [$tabelPkmDsn->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tabelPkmDsn.fields.sumber_biaya') }}</label>
                <select class="form-control {{ $errors->has('sumber_biaya') ? 'is-invalid' : '' }}" name="sumber_biaya" id="sumber_biaya">
                    <option value disabled {{ old('sumber_biaya', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelPkmDsn::SUMBER_BIAYA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sumber_biaya', $tabelPkmDsn->sumber_biaya) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sumber_biaya'))
                    <span class="text-danger">{{ $errors->first('sumber_biaya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelPkmDsn.fields.sumber_biaya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_judul_1">{{ trans('cruds.tabelPkmDsn.fields.jml_judul_1') }}</label>
                <input class="form-control {{ $errors->has('jml_judul_1') ? 'is-invalid' : '' }}" type="number" name="jml_judul_1" id="jml_judul_1" value="{{ old('jml_judul_1', $tabelPkmDsn->jml_judul_1) }}" step="1">
                @if($errors->has('jml_judul_1'))
                    <span class="text-danger">{{ $errors->first('jml_judul_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelPkmDsn.fields.jml_judul_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_judul_2">{{ trans('cruds.tabelPkmDsn.fields.jml_judul_2') }}</label>
                <input class="form-control {{ $errors->has('jml_judul_2') ? 'is-invalid' : '' }}" type="number" name="jml_judul_2" id="jml_judul_2" value="{{ old('jml_judul_2', $tabelPkmDsn->jml_judul_2) }}" step="1">
                @if($errors->has('jml_judul_2'))
                    <span class="text-danger">{{ $errors->first('jml_judul_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelPkmDsn.fields.jml_judul_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_judul_3">{{ trans('cruds.tabelPkmDsn.fields.jml_judul_3') }}</label>
                <input class="form-control {{ $errors->has('jml_judul_3') ? 'is-invalid' : '' }}" type="number" name="jml_judul_3" id="jml_judul_3" value="{{ old('jml_judul_3', $tabelPkmDsn->jml_judul_3) }}" step="1">
                @if($errors->has('jml_judul_3'))
                    <span class="text-danger">{{ $errors->first('jml_judul_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelPkmDsn.fields.jml_judul_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah">{{ trans('cruds.tabelPkmDsn.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $tabelPkmDsn->jumlah) }}" step="1">
                @if($errors->has('jumlah'))
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelPkmDsn.fields.jumlah_helper') }}</span>
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