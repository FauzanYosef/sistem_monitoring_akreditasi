@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelAuditKeuangan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-audit-keuangans.update", [$tabelAuditKeuangan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="lembaga_audit">{{ trans('cruds.tabelAuditKeuangan.fields.lembaga_audit') }}</label>
                <input class="form-control {{ $errors->has('lembaga_audit') ? 'is-invalid' : '' }}" type="text" name="lembaga_audit" id="lembaga_audit" value="{{ old('lembaga_audit', $tabelAuditKeuangan->lembaga_audit) }}">
                @if($errors->has('lembaga_audit'))
                    <span class="text-danger">{{ $errors->first('lembaga_audit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAuditKeuangan.fields.lembaga_audit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tahun">{{ trans('cruds.tabelAuditKeuangan.fields.tahun') }}</label>
                <input class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="text" name="tahun" id="tahun" value="{{ old('tahun', $tabelAuditKeuangan->tahun) }}">
                @if($errors->has('tahun'))
                    <span class="text-danger">{{ $errors->first('tahun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAuditKeuangan.fields.tahun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opini">{{ trans('cruds.tabelAuditKeuangan.fields.opini') }}</label>
                <textarea class="form-control {{ $errors->has('opini') ? 'is-invalid' : '' }}" name="opini" id="opini">{{ old('opini', $tabelAuditKeuangan->opini) }}</textarea>
                @if($errors->has('opini'))
                    <span class="text-danger">{{ $errors->first('opini') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelAuditKeuangan.fields.opini_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.tabelAuditKeuangan.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan', $tabelAuditKeuangan->keterangan) }}</textarea>
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