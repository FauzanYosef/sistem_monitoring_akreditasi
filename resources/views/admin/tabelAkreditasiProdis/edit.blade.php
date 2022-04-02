@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelAkreditasiProdi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-akreditasi-prodis.update", [$tabelAkreditasiProdi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="lembaga_akreditasi_internasional">{{ trans('cruds.tabelAkreditasiProdi.fields.lembaga_akreditasi_internasional') }}</label>
                <input class="form-control {{ $errors->has('lembaga_akreditasi_internasional') ? 'is-invalid' : '' }}" type="text" name="lembaga_akreditasi_internasional" id="lembaga_akreditasi_internasional" value="{{ old('lembaga_akreditasi_internasional', $tabelAkreditasiProdi->lembaga_akreditasi_internasional) }}">
                @if($errors->has('lembaga_akreditasi_internasional'))
                    <span class="text-danger">{{ $errors->first('lembaga_akreditasi_internasional') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreditasiProdi.fields.lembaga_akreditasi_internasional_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prodi_id">{{ trans('cruds.tabelAkreditasiProdi.fields.prodi') }}</label>
                <select class="form-control select2 {{ $errors->has('prodi') ? 'is-invalid' : '' }}" name="prodi_id" id="prodi_id">
                    @foreach($prodis as $id => $entry)
                        <option value="{{ $id }}" {{ (old('prodi_id') ? old('prodi_id') : $tabelAkreditasiProdi->prodi->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('prodi'))
                    <span class="text-danger">{{ $errors->first('prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreditasiProdi.fields.prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tabelAkreditasiProdi.fields.peringkat') }}</label>
                <select class="form-control {{ $errors->has('peringkat') ? 'is-invalid' : '' }}" name="peringkat" id="peringkat">
                    <option value disabled {{ old('peringkat', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelAkreditasiProdi::PERINGKAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('peringkat', $tabelAkreditasiProdi->peringkat) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('peringkat'))
                    <span class="text-danger">{{ $errors->first('peringkat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreditasiProdi.fields.peringkat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="masa_berlaku">{{ trans('cruds.tabelAkreditasiProdi.fields.masa_berlaku') }}</label>
                <input class="form-control {{ $errors->has('masa_berlaku') ? 'is-invalid' : '' }}" type="text" name="masa_berlaku" id="masa_berlaku" value="{{ old('masa_berlaku', $tabelAkreditasiProdi->masa_berlaku) }}">
                @if($errors->has('masa_berlaku'))
                    <span class="text-danger">{{ $errors->first('masa_berlaku') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreditasiProdi.fields.masa_berlaku_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.tabelAkreditasiProdi.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan', $tabelAkreditasiProdi->keterangan) }}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAkreditasiProdi.fields.keterangan_helper') }}</span>
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