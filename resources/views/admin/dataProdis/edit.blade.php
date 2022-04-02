@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dataProdi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.data-prodis.update", [$dataProdi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id_pt_id">{{ trans('cruds.dataProdi.fields.id_pt') }}</label>
                <select class="form-control select2 {{ $errors->has('id_pt') ? 'is-invalid' : '' }}" name="id_pt_id" id="id_pt_id">
                    @foreach($id_pts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_pt_id') ? old('id_pt_id') : $dataProdi->id_pt->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_pt'))
                    <span class="text-danger">{{ $errors->first('id_pt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataProdi.fields.id_pt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kode_prodi_id">{{ trans('cruds.dataProdi.fields.kode_prodi') }}</label>
                <select class="form-control select2 {{ $errors->has('kode_prodi') ? 'is-invalid' : '' }}" name="kode_prodi_id" id="kode_prodi_id">
                    @foreach($kode_prodis as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kode_prodi_id') ? old('kode_prodi_id') : $dataProdi->kode_prodi->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_prodi'))
                    <span class="text-danger">{{ $errors->first('kode_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataProdi.fields.kode_prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.dataProdi.fields.jenjang_prodi') }}</label>
                <select class="form-control {{ $errors->has('jenjang_prodi') ? 'is-invalid' : '' }}" name="jenjang_prodi" id="jenjang_prodi">
                    <option value disabled {{ old('jenjang_prodi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DataProdi::JENJANG_PRODI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenjang_prodi', $dataProdi->jenjang_prodi) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenjang_prodi'))
                    <span class="text-danger">{{ $errors->first('jenjang_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataProdi.fields.jenjang_prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telp_prodi">{{ trans('cruds.dataProdi.fields.telp_prodi') }}</label>
                <input class="form-control {{ $errors->has('telp_prodi') ? 'is-invalid' : '' }}" type="text" name="telp_prodi" id="telp_prodi" value="{{ old('telp_prodi', $dataProdi->telp_prodi) }}">
                @if($errors->has('telp_prodi'))
                    <span class="text-danger">{{ $errors->first('telp_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataProdi.fields.telp_prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_prodi">{{ trans('cruds.dataProdi.fields.email_prodi') }}</label>
                <input class="form-control {{ $errors->has('email_prodi') ? 'is-invalid' : '' }}" type="email" name="email_prodi" id="email_prodi" value="{{ old('email_prodi', $dataProdi->email_prodi) }}">
                @if($errors->has('email_prodi'))
                    <span class="text-danger">{{ $errors->first('email_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataProdi.fields.email_prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="web_prodi">{{ trans('cruds.dataProdi.fields.web_prodi') }}</label>
                <input class="form-control {{ $errors->has('web_prodi') ? 'is-invalid' : '' }}" type="text" name="web_prodi" id="web_prodi" value="{{ old('web_prodi', $dataProdi->web_prodi) }}">
                @if($errors->has('web_prodi'))
                    <span class="text-danger">{{ $errors->first('web_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataProdi.fields.web_prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat_prodi">{{ trans('cruds.dataProdi.fields.alamat_prodi') }}</label>
                <input class="form-control {{ $errors->has('alamat_prodi') ? 'is-invalid' : '' }}" type="text" name="alamat_prodi" id="alamat_prodi" value="{{ old('alamat_prodi', $dataProdi->alamat_prodi) }}">
                @if($errors->has('alamat_prodi'))
                    <span class="text-danger">{{ $errors->first('alamat_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataProdi.fields.alamat_prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.dataProdi.fields.status_prodi') }}</label>
                <select class="form-control {{ $errors->has('status_prodi') ? 'is-invalid' : '' }}" name="status_prodi" id="status_prodi">
                    <option value disabled {{ old('status_prodi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DataProdi::STATUS_PRODI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_prodi', $dataProdi->status_prodi) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_prodi'))
                    <span class="text-danger">{{ $errors->first('status_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataProdi.fields.status_prodi_helper') }}</span>
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