@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dataPt.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.data-pts.update", [$dataPt->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="kode_pt">{{ trans('cruds.dataPt.fields.kode_pt') }}</label>
                <input class="form-control {{ $errors->has('kode_pt') ? 'is-invalid' : '' }}" type="number" name="kode_pt" id="kode_pt" value="{{ old('kode_pt', $dataPt->kode_pt) }}" step="1">
                @if($errors->has('kode_pt'))
                    <span class="text-danger">{{ $errors->first('kode_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.kode_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_pt">{{ trans('cruds.dataPt.fields.nama_pt') }}</label>
                <input class="form-control {{ $errors->has('nama_pt') ? 'is-invalid' : '' }}" type="text" name="nama_pt" id="nama_pt" value="{{ old('nama_pt', $dataPt->nama_pt) }}">
                @if($errors->has('nama_pt'))
                    <span class="text-danger">{{ $errors->first('nama_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.nama_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.dataPt.fields.jenis_pt') }}</label>
                <select class="form-control {{ $errors->has('jenis_pt') ? 'is-invalid' : '' }}" name="jenis_pt" id="jenis_pt">
                    <option value disabled {{ old('jenis_pt', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DataPt::JENIS_PT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_pt', $dataPt->jenis_pt) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_pt'))
                    <span class="text-danger">{{ $errors->first('jenis_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.jenis_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.dataPt.fields.jenis_pengelolaan') }}</label>
                <select class="form-control {{ $errors->has('jenis_pengelolaan') ? 'is-invalid' : '' }}" name="jenis_pengelolaan" id="jenis_pengelolaan">
                    <option value disabled {{ old('jenis_pengelolaan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DataPt::JENIS_PENGELOLAAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_pengelolaan', $dataPt->jenis_pengelolaan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_pengelolaan'))
                    <span class="text-danger">{{ $errors->first('jenis_pengelolaan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.jenis_pengelolaan_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.dataPt.fields.status_pt') }}</label>
                <select class="form-control {{ $errors->has('status_pt') ? 'is-invalid' : '' }}" name="status_pt" id="status_pt">
                    <option value disabled {{ old('status_pt', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DataPt::STATUS_PT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_pt', $dataPt->status_pt) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_pt'))
                    <span class="text-danger">{{ $errors->first('status_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.status_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat_pt">{{ trans('cruds.dataPt.fields.alamat_pt') }}</label>
                <textarea class="form-control {{ $errors->has('alamat_pt') ? 'is-invalid' : '' }}" name="alamat_pt" id="alamat_pt">{{ old('alamat_pt', $dataPt->alamat_pt) }}</textarea>
                @if($errors->has('alamat_pt'))
                    <span class="text-danger">{{ $errors->first('alamat_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.alamat_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_telp_pt">{{ trans('cruds.dataPt.fields.no_telp_pt') }}</label>
                <input class="form-control {{ $errors->has('no_telp_pt') ? 'is-invalid' : '' }}" type="text" name="no_telp_pt" id="no_telp_pt" value="{{ old('no_telp_pt', $dataPt->no_telp_pt) }}">
                @if($errors->has('no_telp_pt'))
                    <span class="text-danger">{{ $errors->first('no_telp_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.no_telp_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_pt">{{ trans('cruds.dataPt.fields.email_pt') }}</label>
                <input class="form-control {{ $errors->has('email_pt') ? 'is-invalid' : '' }}" type="email" name="email_pt" id="email_pt" value="{{ old('email_pt', $dataPt->email_pt) }}">
                @if($errors->has('email_pt'))
                    <span class="text-danger">{{ $errors->first('email_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.email_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="web_pt">{{ trans('cruds.dataPt.fields.web_pt') }}</label>
                <input class="form-control {{ $errors->has('web_pt') ? 'is-invalid' : '' }}" type="text" name="web_pt" id="web_pt" value="{{ old('web_pt', $dataPt->web_pt) }}">
                @if($errors->has('web_pt'))
                    <span class="text-danger">{{ $errors->first('web_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.web_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_sk_pendirian_pt">{{ trans('cruds.dataPt.fields.no_sk_pendirian_pt') }}</label>
                <input class="form-control {{ $errors->has('no_sk_pendirian_pt') ? 'is-invalid' : '' }}" type="text" name="no_sk_pendirian_pt" id="no_sk_pendirian_pt" value="{{ old('no_sk_pendirian_pt', $dataPt->no_sk_pendirian_pt) }}">
                @if($errors->has('no_sk_pendirian_pt'))
                    <span class="text-danger">{{ $errors->first('no_sk_pendirian_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.no_sk_pendirian_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tgl_sk_pendirian_pt">{{ trans('cruds.dataPt.fields.tgl_sk_pendirian_pt') }}</label>
                <input class="form-control date {{ $errors->has('tgl_sk_pendirian_pt') ? 'is-invalid' : '' }}" type="text" name="tgl_sk_pendirian_pt" id="tgl_sk_pendirian_pt" value="{{ old('tgl_sk_pendirian_pt', $dataPt->tgl_sk_pendirian_pt) }}">
                @if($errors->has('tgl_sk_pendirian_pt'))
                    <span class="text-danger">{{ $errors->first('tgl_sk_pendirian_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.tgl_sk_pendirian_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="peringkat_akre_pt">{{ trans('cruds.dataPt.fields.peringkat_akre_pt') }}</label>
                <input class="form-control {{ $errors->has('peringkat_akre_pt') ? 'is-invalid' : '' }}" type="text" name="peringkat_akre_pt" id="peringkat_akre_pt" value="{{ old('peringkat_akre_pt', $dataPt->peringkat_akre_pt) }}">
                @if($errors->has('peringkat_akre_pt'))
                    <span class="text-danger">{{ $errors->first('peringkat_akre_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.peringkat_akre_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_sk_banpt">{{ trans('cruds.dataPt.fields.no_sk_banpt') }}</label>
                <input class="form-control {{ $errors->has('no_sk_banpt') ? 'is-invalid' : '' }}" type="text" name="no_sk_banpt" id="no_sk_banpt" value="{{ old('no_sk_banpt', $dataPt->no_sk_banpt) }}">
                @if($errors->has('no_sk_banpt'))
                    <span class="text-danger">{{ $errors->first('no_sk_banpt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.no_sk_banpt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ts_pt">{{ trans('cruds.dataPt.fields.ts_pt') }}</label>
                <input class="form-control {{ $errors->has('ts_pt') ? 'is-invalid' : '' }}" type="text" name="ts_pt" id="ts_pt" value="{{ old('ts_pt', $dataPt->ts_pt) }}">
                @if($errors->has('ts_pt'))
                    <span class="text-danger">{{ $errors->first('ts_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPt.fields.ts_pt_helper') }}</span>
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