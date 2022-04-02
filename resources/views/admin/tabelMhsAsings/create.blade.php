@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tabelMhsAsing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-mhs-asings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_tahun">Tahun</label>
                <select class="form-control select2 {{ $errors->has('tahun_pengajuan') ? 'is-invalid' : '' }}" name="id_tahun" id="id_tahun" required> 
                    @foreach($tahun_pengajuans as $key => $entry)
                        <option value="{{ $key }}" {{ old('tahun_pengajuan') == $key ? 'selected' : '' }}>{{ $entry }}  </option>
                    @endforeach 
                </select>
                @if($errors->has('tahun_pengajuan'))
                    <span class="text-danger">{{ $errors->first('tahun_pengajuan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.formEssai.fields.elemen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prodi_id">{{ trans('cruds.tabelMhsAsing.fields.prodi') }}</label>
                <select class="form-control select2 {{ $errors->has('prodi') ? 'is-invalid' : '' }}" name="prodi_id" id="prodi_id">
                    @foreach($prodis as $id => $entry)
                        <option value="{{ $id }}" {{ old('prodi_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('prodi'))
                    <span class="text-danger">{{ $errors->first('prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelMhsAsing.fields.prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ts_2">{{ trans('cruds.tabelMhsAsing.fields.ts_2') }}</label>
                <input class="form-control {{ $errors->has('ts_2') ? 'is-invalid' : '' }}" type="number" name="ts_2" id="ts_2" value="{{ old('ts_2', '') }}" step="1">
                @if($errors->has('ts_2'))
                    <span class="text-danger">{{ $errors->first('ts_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelMhsAsing.fields.ts_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ts_1">{{ trans('cruds.tabelMhsAsing.fields.ts_1') }}</label>
                <input class="form-control {{ $errors->has('ts_1') ? 'is-invalid' : '' }}" type="number" name="ts_1" id="ts_1" value="{{ old('ts_1', '') }}" step="1">
                @if($errors->has('ts_1'))
                    <span class="text-danger">{{ $errors->first('ts_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelMhsAsing.fields.ts_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ts">{{ trans('cruds.tabelMhsAsing.fields.ts') }}</label>
                <input class="form-control {{ $errors->has('ts') ? 'is-invalid' : '' }}" type="number" name="ts" id="ts" value="{{ old('ts', '') }}" step="1">
                @if($errors->has('ts'))
                    <span class="text-danger">{{ $errors->first('ts') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelMhsAsing.fields.ts_helper') }}</span>
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