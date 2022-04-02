@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tabelAuditKeuangan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-audit-keuangans.store") }}" enctype="multipart/form-data">
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
                <label for="lembaga_audit">{{ trans('cruds.tabelAuditKeuangan.fields.lembaga_audit') }}</label>
                <input class="form-control {{ $errors->has('lembaga_audit') ? 'is-invalid' : '' }}" type="text" name="lembaga_audit" id="lembaga_audit" value="{{ old('lembaga_audit', '') }}">
                @if($errors->has('lembaga_audit'))
                    <span class="text-danger">{{ $errors->first('lembaga_audit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAuditKeuangan.fields.lembaga_audit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tahun">{{ trans('cruds.tabelAuditKeuangan.fields.tahun') }}</label>
                <input class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="text" name="tahun" id="tahun" value="{{ old('tahun', '') }}">
                @if($errors->has('tahun'))
                    <span class="text-danger">{{ $errors->first('tahun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAuditKeuangan.fields.tahun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opini">{{ trans('cruds.tabelAuditKeuangan.fields.opini') }}</label>
                <textarea class="form-control {{ $errors->has('opini') ? 'is-invalid' : '' }}" name="opini" id="opini">{{ old('opini') }}</textarea>
                @if($errors->has('opini'))
                    <span class="text-danger">{{ $errors->first('opini') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAuditKeuangan.fields.opini_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.tabelAuditKeuangan.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAuditKeuangan.fields.keterangan_helper') }}</span>
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