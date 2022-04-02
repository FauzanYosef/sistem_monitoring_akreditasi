@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tabelAkreProdi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-akre-prodis.store") }}" enctype="multipart/form-data">
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
                <label>{{ trans('cruds.tabelAkreProdi.fields.status_akreditasi') }}</label>
                <select class="form-control {{ $errors->has('status_akreditasi') ? 'is-invalid' : '' }}" name="status_akreditasi" id="status_akreditasi">
                    <option value disabled {{ old('status_akreditasi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelAkreProdi::STATUS_AKREDITASI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_akreditasi', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_akreditasi'))
                    <span class="text-danger">{{ $errors->first('status_akreditasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.status_akreditasi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_doktor">{{ trans('cruds.tabelAkreProdi.fields.jml_doktor') }}</label>
                <input class="form-control {{ $errors->has('jml_doktor') ? 'is-invalid' : '' }}" type="number" name="jml_doktor" id="jml_doktor" value="{{ old('jml_doktor', '') }}" step="1">
                @if($errors->has('jml_doktor'))
                    <span class="text-danger">{{ $errors->first('jml_doktor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_doktor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_magister">{{ trans('cruds.tabelAkreProdi.fields.jml_magister') }}</label>
                <input class="form-control {{ $errors->has('jml_magister') ? 'is-invalid' : '' }}" type="number" name="jml_magister" id="jml_magister" value="{{ old('jml_magister', '') }}" step="1">
                @if($errors->has('jml_magister'))
                    <span class="text-danger">{{ $errors->first('jml_magister') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_magister_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_sarjana">{{ trans('cruds.tabelAkreProdi.fields.jml_sarjana') }}</label>
                <input class="form-control {{ $errors->has('jml_sarjana') ? 'is-invalid' : '' }}" type="number" name="jml_sarjana" id="jml_sarjana" value="{{ old('jml_sarjana', '') }}" step="1">
                @if($errors->has('jml_sarjana'))
                    <span class="text-danger">{{ $errors->first('jml_sarjana') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_sarjana_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_profesi_2">{{ trans('cruds.tabelAkreProdi.fields.jml_profesi_2') }}</label>
                <input class="form-control {{ $errors->has('jml_profesi_2') ? 'is-invalid' : '' }}" type="number" name="jml_profesi_2" id="jml_profesi_2" value="{{ old('jml_profesi_2', '') }}" step="1">
                @if($errors->has('jml_profesi_2'))
                    <span class="text-danger">{{ $errors->first('jml_profesi_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_profesi_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_profesi_1">{{ trans('cruds.tabelAkreProdi.fields.jml_profesi_1') }}</label>
                <input class="form-control {{ $errors->has('jml_profesi_1') ? 'is-invalid' : '' }}" type="number" name="jml_profesi_1" id="jml_profesi_1" value="{{ old('jml_profesi_1', '') }}" step="1">
                @if($errors->has('jml_profesi_1'))
                    <span class="text-danger">{{ $errors->first('jml_profesi_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_profesi_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_profesi">{{ trans('cruds.tabelAkreProdi.fields.jml_profesi') }}</label>
                <input class="form-control {{ $errors->has('jml_profesi') ? 'is-invalid' : '' }}" type="number" name="jml_profesi" id="jml_profesi" value="{{ old('jml_profesi', '') }}" step="1">
                @if($errors->has('jml_profesi'))
                    <span class="text-danger">{{ $errors->first('jml_profesi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_profesi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_vokasi_1">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_1') }}</label>
                <input class="form-control {{ $errors->has('jml_vokasi_1') ? 'is-invalid' : '' }}" type="number" name="jml_vokasi_1" id="jml_vokasi_1" value="{{ old('jml_vokasi_1', '') }}" step="1">
                @if($errors->has('jml_vokasi_1'))
                    <span class="text-danger">{{ $errors->first('jml_vokasi_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_vokasi_2">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_2') }}</label>
                <input class="form-control {{ $errors->has('jml_vokasi_2') ? 'is-invalid' : '' }}" type="number" name="jml_vokasi_2" id="jml_vokasi_2" value="{{ old('jml_vokasi_2', '') }}" step="1">
                @if($errors->has('jml_vokasi_2'))
                    <span class="text-danger">{{ $errors->first('jml_vokasi_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_vokasi_4">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_4') }}</label>
                <input class="form-control {{ $errors->has('jml_vokasi_4') ? 'is-invalid' : '' }}" type="number" name="jml_vokasi_4" id="jml_vokasi_4" value="{{ old('jml_vokasi_4', '') }}" step="1">
                @if($errors->has('jml_vokasi_4'))
                    <span class="text-danger">{{ $errors->first('jml_vokasi_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_vokasi_5">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_5') }}</label>
                <input class="form-control {{ $errors->has('jml_vokasi_5') ? 'is-invalid' : '' }}" type="number" name="jml_vokasi_5" id="jml_vokasi_5" value="{{ old('jml_vokasi_5', '') }}" step="1">
                @if($errors->has('jml_vokasi_5'))
                    <span class="text-danger">{{ $errors->first('jml_vokasi_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_vokasi_6">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_6') }}</label>
                <input class="form-control {{ $errors->has('jml_vokasi_6') ? 'is-invalid' : '' }}" type="number" name="jml_vokasi_6" id="jml_vokasi_6" value="{{ old('jml_vokasi_6', '') }}" step="1">
                @if($errors->has('jml_vokasi_6'))
                    <span class="text-danger">{{ $errors->first('jml_vokasi_6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_vokasi_7">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_7') }}</label>
                <input class="form-control {{ $errors->has('jml_vokasi_7') ? 'is-invalid' : '' }}" type="number" name="jml_vokasi_7" id="jml_vokasi_7" value="{{ old('jml_vokasi_7', '') }}" step="1">
                @if($errors->has('jml_vokasi_7'))
                    <span class="text-danger">{{ $errors->first('jml_vokasi_7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.jml_vokasi_7_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.tabelAkreProdi.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="1">
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreProdi.fields.total_helper') }}</span>
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