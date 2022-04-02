@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.indikatorPenilaian.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.indikator-penilaians.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="elemen">{{ trans('cruds.indikatorPenilaian.fields.elemen') }}</label>
                <input class="form-control {{ $errors->has('elemen') ? 'is-invalid' : '' }}" type="text" name="elemen" id="elemen" value="{{ old('elemen', '') }}" required>
                @if($errors->has('elemen'))
                    <span class="text-danger">{{ $errors->first('elemen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.indikatorPenilaian.fields.elemen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="elemen_indikator">{{ trans('cruds.indikatorPenilaian.fields.elemen_indikator') }}</label>
                <textarea class="form-control {{ $errors->has('elemen_indikator') ? 'is-invalid' : '' }}" name="elemen_indikator" id="elemen_indikator">{{ old('elemen_indikator') }}</textarea>
                @if($errors->has('elemen_indikator'))
                    <span class="text-danger">{{ $errors->first('elemen_indikator') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.indikatorPenilaian.fields.elemen_indikator_helper') }}</span>
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