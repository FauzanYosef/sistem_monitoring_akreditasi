@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelKckpanDsn.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-kckpan-dsns.update", [$tabelKckpanDsn->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tabelKckpanDsn.fields.pengelola') }}</label>
                <select class="form-control {{ $errors->has('pengelola') ? 'is-invalid' : '' }}" name="pengelola" id="pengelola">
                    <option value disabled {{ old('pengelola', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelKckpanDsn::PENGELOLA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('pengelola', $tabelKckpanDsn->pengelola) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('pengelola'))
                    <span class="text-danger">{{ $errors->first('pengelola') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKckpanDsn.fields.pengelola_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="doktor">{{ trans('cruds.tabelKckpanDsn.fields.doktor') }}</label>
                <input class="form-control {{ $errors->has('doktor') ? 'is-invalid' : '' }}" type="number" name="doktor" id="doktor" value="{{ old('doktor', $tabelKckpanDsn->doktor) }}" step="1">
                @if($errors->has('doktor'))
                    <span class="text-danger">{{ $errors->first('doktor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKckpanDsn.fields.doktor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="magister">{{ trans('cruds.tabelKckpanDsn.fields.magister') }}</label>
                <input class="form-control {{ $errors->has('magister') ? 'is-invalid' : '' }}" type="number" name="magister" id="magister" value="{{ old('magister', $tabelKckpanDsn->magister) }}" step="1">
                @if($errors->has('magister'))
                    <span class="text-danger">{{ $errors->first('magister') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKckpanDsn.fields.magister_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profesi">{{ trans('cruds.tabelKckpanDsn.fields.profesi') }}</label>
                <input class="form-control {{ $errors->has('profesi') ? 'is-invalid' : '' }}" type="number" name="profesi" id="profesi" value="{{ old('profesi', $tabelKckpanDsn->profesi) }}" step="1">
                @if($errors->has('profesi'))
                    <span class="text-danger">{{ $errors->first('profesi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKckpanDsn.fields.profesi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah">{{ trans('cruds.tabelKckpanDsn.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $tabelKckpanDsn->jumlah) }}" step="1">
                @if($errors->has('jumlah'))
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKckpanDsn.fields.jumlah_helper') }}</span>
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