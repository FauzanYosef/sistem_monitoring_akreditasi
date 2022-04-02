@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tblPrestasiNon.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-prestasi-nons.update", [$tblPrestasiNon->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama_kegiatan">{{ trans('cruds.tblPrestasiNon.fields.nama_kegiatan') }}</label>
                <input class="form-control {{ $errors->has('nama_kegiatan') ? 'is-invalid' : '' }}" type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan', $tblPrestasiNon->nama_kegiatan) }}">
                @if($errors->has('nama_kegiatan'))
                    <span class="text-danger">{{ $errors->first('nama_kegiatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPrestasiNon.fields.nama_kegiatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="waktu">{{ trans('cruds.tblPrestasiNon.fields.waktu') }}</label>
                <input class="form-control {{ $errors->has('waktu') ? 'is-invalid' : '' }}" type="text" name="waktu" id="waktu" value="{{ old('waktu', $tblPrestasiNon->waktu) }}">
                @if($errors->has('waktu'))
                    <span class="text-danger">{{ $errors->first('waktu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPrestasiNon.fields.waktu_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tblPrestasiNon.fields.tingkat') }}</label>
                <select class="form-control {{ $errors->has('tingkat') ? 'is-invalid' : '' }}" name="tingkat" id="tingkat">
                    <option value disabled {{ old('tingkat', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TblPrestasiNon::TINGKAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tingkat', $tblPrestasiNon->tingkat) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tingkat'))
                    <span class="text-danger">{{ $errors->first('tingkat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPrestasiNon.fields.tingkat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prestasi">{{ trans('cruds.tblPrestasiNon.fields.prestasi') }}</label>
                <textarea class="form-control {{ $errors->has('prestasi') ? 'is-invalid' : '' }}" name="prestasi" id="prestasi">{{ old('prestasi', $tblPrestasiNon->prestasi) }}</textarea>
                @if($errors->has('prestasi'))
                    <span class="text-danger">{{ $errors->first('prestasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPrestasiNon.fields.prestasi_helper') }}</span>
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