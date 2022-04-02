@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblLuaranLainnya.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-luaran-lainnyas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.tblLuaranLainnya.fields.hakcipta') }}</label>
                <select class="form-control {{ $errors->has('hakcipta') ? 'is-invalid' : '' }}" name="hakcipta" id="hakcipta">
                    <option value disabled {{ old('hakcipta', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblLuaranLainnya::HAKCIPTA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hakcipta', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hakcipta'))
                    <span class="text-danger">{{ $errors->first('hakcipta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLuaranLainnya.fields.hakcipta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="penelitian">{{ trans('cruds.tblLuaranLainnya.fields.penelitian') }}</label>
                <textarea class="form-control {{ $errors->has('penelitian') ? 'is-invalid' : '' }}" name="penelitian" id="penelitian">{{ old('penelitian') }}</textarea>
                @if($errors->has('penelitian'))
                    <span class="text-danger">{{ $errors->first('penelitian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLuaranLainnya.fields.penelitian_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tahun">{{ trans('cruds.tblLuaranLainnya.fields.tahun') }}</label>
                <input class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="text" name="tahun" id="tahun" value="{{ old('tahun', '') }}">
                @if($errors->has('tahun'))
                    <span class="text-danger">{{ $errors->first('tahun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLuaranLainnya.fields.tahun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.tblLuaranLainnya.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblLuaranLainnya.fields.keterangan_helper') }}</span>
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