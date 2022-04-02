@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kodeprodi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kodeprodis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kode_prodi">{{ trans('cruds.kodeprodi.fields.kode_prodi') }}</label>
                <input class="form-control {{ $errors->has('kode_prodi') ? 'is-invalid' : '' }}" type="text" name="kode_prodi" id="kode_prodi" value="{{ old('kode_prodi', '') }}">
                @if($errors->has('kode_prodi'))
                    <span class="text-danger">{{ $errors->first('kode_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kodeprodi.fields.kode_prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_prodi">{{ trans('cruds.kodeprodi.fields.nama_prodi') }}</label>
                <input class="form-control {{ $errors->has('nama_prodi') ? 'is-invalid' : '' }}" type="text" name="nama_prodi" id="nama_prodi" value="{{ old('nama_prodi', '') }}">
                @if($errors->has('nama_prodi'))
                    <span class="text-danger">{{ $errors->first('nama_prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kodeprodi.fields.nama_prodi_helper') }}</span>
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