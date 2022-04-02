@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tblSitasiKarya.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-sitasi-karyas.update", [$tblSitasiKarya->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama_penulis">{{ trans('cruds.tblSitasiKarya.fields.nama_penulis') }}</label>
                <input class="form-control {{ $errors->has('nama_penulis') ? 'is-invalid' : '' }}" type="text" name="nama_penulis" id="nama_penulis" value="{{ old('nama_penulis', $tblSitasiKarya->nama_penulis) }}">
                @if($errors->has('nama_penulis'))
                    <span class="text-danger">{{ $errors->first('nama_penulis') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblSitasiKarya.fields.nama_penulis_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="artikel">{{ trans('cruds.tblSitasiKarya.fields.artikel') }}</label>
                <textarea class="form-control {{ $errors->has('artikel') ? 'is-invalid' : '' }}" name="artikel" id="artikel">{{ old('artikel', $tblSitasiKarya->artikel) }}</textarea>
                @if($errors->has('artikel'))
                    <span class="text-danger">{{ $errors->first('artikel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblSitasiKarya.fields.artikel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_artiker">{{ trans('cruds.tblSitasiKarya.fields.jml_artiker') }}</label>
                <input class="form-control {{ $errors->has('jml_artiker') ? 'is-invalid' : '' }}" type="number" name="jml_artiker" id="jml_artiker" value="{{ old('jml_artiker', $tblSitasiKarya->jml_artiker) }}" step="1">
                @if($errors->has('jml_artiker'))
                    <span class="text-danger">{{ $errors->first('jml_artiker') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblSitasiKarya.fields.jml_artiker_helper') }}</span>
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