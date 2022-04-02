@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.borang.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.borangs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_file">{{ trans('cruds.borang.fields.nama_file') }}</label>
                <input class="form-control {{ $errors->has('nama_file') ? 'is-invalid' : '' }}" type="text" name="nama_file" id="nama_file" value="{{ old('nama_file', '') }}">
                @if($errors->has('nama_file'))
                    <span class="text-danger">{{ $errors->first('nama_file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.borang.fields.nama_file_helper') }}</span>
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