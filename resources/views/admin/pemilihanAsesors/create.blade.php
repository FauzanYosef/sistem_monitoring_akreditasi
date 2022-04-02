@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pemilihanAsesor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pemilihan-asesors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="prodi_id">{{ trans('cruds.pemilihanAsesor.fields.prodi') }}</label>
                <select class="form-control select2 {{ $errors->has('prodi') ? 'is-invalid' : '' }}" name="prodi_id" id="prodi_id">
                    @foreach($prodis as $id => $entry)
                        <option value="{{ $id }}" {{ old('prodi_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('prodi'))
                    <span class="text-danger">{{ $errors->first('prodi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilihanAsesor.fields.prodi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_assesor_id">{{ trans('cruds.pemilihanAsesor.fields.id_assesor') }}</label>
                <select class="form-control select2 {{ $errors->has('id_assesor') ? 'is-invalid' : '' }}" name="id_assesor_id" id="id_assesor_id">
                    @foreach($id_assesors as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_assesor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_assesor'))
                    <span class="text-danger">{{ $errors->first('id_assesor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilihanAsesor.fields.id_assesor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_pemilihan">{{ trans('cruds.pemilihanAsesor.fields.id_pemilihan') }}</label>
                <input class="form-control {{ $errors->has('id_pemilihan') ? 'is-invalid' : '' }}" type="text" name="id_pemilihan" id="id_pemilihan" value="{{ old('id_pemilihan', '') }}">
                @if($errors->has('id_pemilihan'))
                    <span class="text-danger">{{ $errors->first('id_pemilihan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilihanAsesor.fields.id_pemilihan_helper') }}</span>
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