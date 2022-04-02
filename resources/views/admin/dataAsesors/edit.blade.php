@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dataAsesor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.data-asesors.update", [$dataAsesor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nip_assesor">{{ trans('cruds.dataAsesor.fields.nip_assesor') }}</label>
                <input class="form-control {{ $errors->has('nip_assesor') ? 'is-invalid' : '' }}" type="text" name="nip_assesor" id="nip_assesor" value="{{ old('nip_assesor', $dataAsesor->nip_assesor) }}">
                @if($errors->has('nip_assesor'))
                    <span class="text-danger">{{ $errors->first('nip_assesor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataAsesor.fields.nip_assesor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_asesor">{{ trans('cruds.dataAsesor.fields.nama_asesor') }}</label>
                <input class="form-control {{ $errors->has('nama_asesor') ? 'is-invalid' : '' }}" type="text" name="nama_asesor" id="nama_asesor" value="{{ old('nama_asesor', $dataAsesor->nama_asesor) }}">
                @if($errors->has('nama_asesor'))
                    <span class="text-danger">{{ $errors->first('nama_asesor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataAsesor.fields.nama_asesor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_assesor">{{ trans('cruds.dataAsesor.fields.email_assesor') }}</label>
                <input class="form-control {{ $errors->has('email_assesor') ? 'is-invalid' : '' }}" type="email" name="email_assesor" id="email_assesor" value="{{ old('email_assesor', $dataAsesor->email_assesor) }}">
                @if($errors->has('email_assesor'))
                    <span class="text-danger">{{ $errors->first('email_assesor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataAsesor.fields.email_assesor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telp_asesor">{{ trans('cruds.dataAsesor.fields.telp_asesor') }}</label>
                <input class="form-control {{ $errors->has('telp_asesor') ? 'is-invalid' : '' }}" type="text" name="telp_asesor" id="telp_asesor" value="{{ old('telp_asesor', $dataAsesor->telp_asesor) }}">
                @if($errors->has('telp_asesor'))
                    <span class="text-danger">{{ $errors->first('telp_asesor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataAsesor.fields.telp_asesor_helper') }}</span>
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