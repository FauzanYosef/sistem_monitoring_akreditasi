@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dataPengajuan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.data-pengajuans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tahun_pengajuan">{{ trans('cruds.dataPengajuan.fields.tahun_pengajuan') }}</label>
                <input class="form-control {{ $errors->has('tahun_pengajuan') ? 'is-invalid' : '' }}" type="text" name="tahun_pengajuan" id="tahun_pengajuan" value="{{ old('tahun_pengajuan', '') }}">
                @if($errors->has('tahun_pengajuan'))
                    <span class="text-danger">{{ $errors->first('tahun_pengajuan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPengajuan.fields.tahun_pengajuan_helper') }}</span>
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