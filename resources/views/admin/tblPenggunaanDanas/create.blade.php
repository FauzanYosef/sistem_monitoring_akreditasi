@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tblPenggunaanDana.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tbl-penggunaan-danas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="jenis_penggunaan">{{ trans('cruds.tblPenggunaanDana.fields.jenis_penggunaan') }}</label>
                <input class="form-control {{ $errors->has('jenis_penggunaan') ? 'is-invalid' : '' }}" type="text" name="jenis_penggunaan" id="jenis_penggunaan" value="{{ old('jenis_penggunaan', '') }}">
                @if($errors->has('jenis_penggunaan'))
                    <span class="text-danger">{{ $errors->first('jenis_penggunaan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPenggunaanDana.fields.jenis_penggunaan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_ts_2">{{ trans('cruds.tblPenggunaanDana.fields.jml_ts_2') }}</label>
                <input class="form-control {{ $errors->has('jml_ts_2') ? 'is-invalid' : '' }}" type="number" name="jml_ts_2" id="jml_ts_2" value="{{ old('jml_ts_2', '') }}" step="0.01">
                @if($errors->has('jml_ts_2'))
                    <span class="text-danger">{{ $errors->first('jml_ts_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPenggunaanDana.fields.jml_ts_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_dana_ts_1">{{ trans('cruds.tblPenggunaanDana.fields.jml_dana_ts_1') }}</label>
                <input class="form-control {{ $errors->has('jml_dana_ts_1') ? 'is-invalid' : '' }}" type="number" name="jml_dana_ts_1" id="jml_dana_ts_1" value="{{ old('jml_dana_ts_1', '') }}" step="0.01">
                @if($errors->has('jml_dana_ts_1'))
                    <span class="text-danger">{{ $errors->first('jml_dana_ts_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPenggunaanDana.fields.jml_dana_ts_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_dana_ts">{{ trans('cruds.tblPenggunaanDana.fields.jml_dana_ts') }}</label>
                <input class="form-control {{ $errors->has('jml_dana_ts') ? 'is-invalid' : '' }}" type="number" name="jml_dana_ts" id="jml_dana_ts" value="{{ old('jml_dana_ts', '') }}" step="0.01">
                @if($errors->has('jml_dana_ts'))
                    <span class="text-danger">{{ $errors->first('jml_dana_ts') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPenggunaanDana.fields.jml_dana_ts_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml">{{ trans('cruds.tblPenggunaanDana.fields.jml') }}</label>
                <input class="form-control {{ $errors->has('jml') ? 'is-invalid' : '' }}" type="number" name="jml" id="jml" value="{{ old('jml', '') }}" step="0.01">
                @if($errors->has('jml'))
                    <span class="text-danger">{{ $errors->first('jml') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tblPenggunaanDana.fields.jml_helper') }}</span>
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