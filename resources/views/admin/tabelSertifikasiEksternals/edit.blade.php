@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelSertifikasiEksternal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-sertifikasi-eksternals.update", [$tabelSertifikasiEksternal->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="lembaga_akreditasi">{{ trans('cruds.tabelSertifikasiEksternal.fields.lembaga_akreditasi') }}</label>
                <input class="form-control {{ $errors->has('lembaga_akreditasi') ? 'is-invalid' : '' }}" type="text" name="lembaga_akreditasi" id="lembaga_akreditasi" value="{{ old('lembaga_akreditasi', $tabelSertifikasiEksternal->lembaga_akreditasi) }}">
                @if($errors->has('lembaga_akreditasi'))
                    <span class="text-danger">{{ $errors->first('lembaga_akreditasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.lembaga_akreditasi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jenis_akreditasi">{{ trans('cruds.tabelSertifikasiEksternal.fields.jenis_akreditasi') }}</label>
                <input class="form-control {{ $errors->has('jenis_akreditasi') ? 'is-invalid' : '' }}" type="text" name="jenis_akreditasi" id="jenis_akreditasi" value="{{ old('jenis_akreditasi', $tabelSertifikasiEksternal->jenis_akreditasi) }}">
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
                        <option value="{{ $key }}" {{ old('lingkup', $tabelSertifikasiEksternal->lingkup) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                        <option value="{{ $key }}" {{ old('tingkat', $tabelSertifikasiEksternal->tingkat) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tingkat'))
                    <span class="text-danger">{{ $errors->first('tingkat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.tingkat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="masa_berlaku">{{ trans('cruds.tabelSertifikasiEksternal.fields.masa_berlaku') }}</label>
                <input class="form-control {{ $errors->has('masa_berlaku') ? 'is-invalid' : '' }}" type="text" name="masa_berlaku" id="masa_berlaku" value="{{ old('masa_berlaku', $tabelSertifikasiEksternal->masa_berlaku) }}">
                @if($errors->has('masa_berlaku'))
                    <span class="text-danger">{{ $errors->first('masa_berlaku') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSertifikasiEksternal.fields.masa_berlaku_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.tabelSertifikasiEksternal.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan', $tabelSertifikasiEksternal->keterangan) }}</textarea>
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