@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tabelSertifikasiEksternal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-sertifikasi-eksternals.store") }}" enctype="multipart/form-data">
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
                <label for="lembaga_akreditasi">{{ trans('cruds.tabelSertifikasiEksternal.fields.lembaga_akreditasi') }}</label>
                <input class="form-control {{ $errors->has('lembaga_akreditasi') ? 'is-invalid' : '' }}" type="text" name="lembaga_akreditasi" id="lembaga_akreditasi" value="{{ old('lembaga_akreditasi', '') }}">
                @if($errors->has('lembaga_akreditasi'))
                    <span class="text-danger">{{ $errors->first('lembaga_akreditasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.lembaga_akreditasi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jenis_akreditasi">{{ trans('cruds.tabelSertifikasiEksternal.fields.jenis_akreditasi') }}</label>
                <input class="form-control {{ $errors->has('jenis_akreditasi') ? 'is-invalid' : '' }}" type="text" name="jenis_akreditasi" id="jenis_akreditasi" value="{{ old('jenis_akreditasi', '') }}">
                @if($errors->has('jenis_akreditasi'))
                    <span class="text-danger">{{ $errors->first('jenis_akreditasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.jenis_akreditasi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tabelSertifikasiEksternal.fields.lingkup') }}</label>
                <select class="form-control {{ $errors->has('lingkup') ? 'is-invalid' : '' }}" name="lingkup" id="lingkup">
                    <option value disabled {{ old('lingkup', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelSertifikasiEksternal::LINGKUP_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('lingkup', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('lingkup'))
                    <span class="text-danger">{{ $errors->first('lingkup') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.lingkup_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tabelSertifikasiEksternal.fields.tingkat') }}</label>
                <select class="form-control {{ $errors->has('tingkat') ? 'is-invalid' : '' }}" name="tingkat" id="tingkat">
                    <option value disabled {{ old('tingkat', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelSertifikasiEksternal::TINGKAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tingkat', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tingkat'))
                    <span class="text-danger">{{ $errors->first('tingkat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.tingkat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="masa_berlaku">{{ trans('cruds.tabelSertifikasiEksternal.fields.masa_berlaku') }}</label>
                <input class="form-control {{ $errors->has('masa_berlaku') ? 'is-invalid' : '' }}" type="text" name="masa_berlaku" id="masa_berlaku" value="{{ old('masa_berlaku', '') }}">
                @if($errors->has('masa_berlaku'))
                    <span class="text-danger">{{ $errors->first('masa_berlaku') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.masa_berlaku_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.tabelSertifikasiEksternal.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.keterangan_helper') }}</span>
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