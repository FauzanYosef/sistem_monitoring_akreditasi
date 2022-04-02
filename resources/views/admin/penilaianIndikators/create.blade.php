@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.penilaianIndikator.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.penilaian-indikators.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="indikator_skor_id">{{ trans('cruds.penilaianIndikator.fields.indikator_skor') }}</label>
                <select class="form-control select2 {{ $errors->has('indikator_skor') ? 'is-invalid' : '' }}" name="indikator_skor_id" id="indikator_skor_id">
                    @foreach($indikator_skors as $id => $entry)
                        <option value="{{ $id }}" {{ old('indikator_skor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('indikator_skor'))
                    <span class="text-danger">{{ $errors->first('indikator_skor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.penilaianIndikator.fields.indikator_skor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pilihan_penilaian">{{ trans('cruds.penilaianIndikator.fields.pilihan_penilaian') }}</label>
                <textarea class="form-control {{ $errors->has('pilihan_penilaian') ? 'is-invalid' : '' }}" name="pilihan_penilaian" id="pilihan_penilaian">{{ old('pilihan_penilaian') }}</textarea>
                @if($errors->has('pilihan_penilaian'))
                    <span class="text-danger">{{ $errors->first('pilihan_penilaian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.penilaianIndikator.fields.pilihan_penilaian_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="label_nilai">{{ trans('cruds.penilaianIndikator.fields.label_nilai') }}</label>
                <input class="form-control {{ $errors->has('label_nilai') ? 'is-invalid' : '' }}" type="text" name="label_nilai" id="label_nilai" value="{{ old('label_nilai', '') }}">
                @if($errors->has('label_nilai'))
                    <span class="text-danger">{{ $errors->first('label_nilai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.penilaianIndikator.fields.label_nilai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skor_nilai">{{ trans('cruds.penilaianIndikator.fields.skor_nilai') }}</label>
                <input class="form-control {{ $errors->has('skor_nilai') ? 'is-invalid' : '' }}" type="number" name="skor_nilai" id="skor_nilai" value="{{ old('skor_nilai', '') }}" step="1">
                @if($errors->has('skor_nilai'))
                    <span class="text-danger">{{ $errors->first('skor_nilai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.penilaianIndikator.fields.skor_nilai_helper') }}</span>
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