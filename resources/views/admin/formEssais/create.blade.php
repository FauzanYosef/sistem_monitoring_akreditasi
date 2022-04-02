@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.formEssai.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.form-essais.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="elemen_id">{{ trans('cruds.formEssai.fields.elemen') }}</label>
                <select class="form-control select2 {{ $errors->has('elemen') ? 'is-invalid' : '' }}" name="elemen_id" id="elemen_id">
                    @foreach($elemens as $id => $entry)
                        <option value="{{ $id }}" {{ old('elemen_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('elemen'))
                    <span class="text-danger">{{ $errors->first('elemen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.formEssai.fields.elemen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="isi_essai">{{ trans('cruds.formEssai.fields.isi_essai') }}</label>
                <textarea class="form-control {{ $errors->has('isi_essai') ? 'is-invalid' : '' }}" name="isi_essai" id="isi_essai">{{ old('isi_essai') }}</textarea>
                @if($errors->has('isi_essai'))
                    <span class="text-danger">{{ $errors->first('isi_essai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.formEssai.fields.isi_essai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.formEssai.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.formEssai.fields.keterangan_helper') }}</span>
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