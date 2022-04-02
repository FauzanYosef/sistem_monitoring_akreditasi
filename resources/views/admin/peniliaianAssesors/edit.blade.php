@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.peniliaianAssesor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.peniliaian-assesors.update", [$peniliaianAssesor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id_assesor_id">{{ trans('cruds.peniliaianAssesor.fields.id_assesor') }}</label>
                <select class="form-control select2 {{ $errors->has('id_assesor') ? 'is-invalid' : '' }}" name="id_assesor_id" id="id_assesor_id">
                    @foreach($id_assesors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_assesor_id') ? old('id_assesor_id') : $peniliaianAssesor->id_assesor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_assesor'))
                    <span class="text-danger">{{ $errors->first('id_assesor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peniliaianAssesor.fields.id_assesor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_skor_id">{{ trans('cruds.peniliaianAssesor.fields.id_skor') }}</label>
                <select class="form-control select2 {{ $errors->has('id_skor') ? 'is-invalid' : '' }}" name="id_skor_id" id="id_skor_id">
                    @foreach($id_skors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_skor_id') ? old('id_skor_id') : $peniliaianAssesor->id_skor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_skor'))
                    <span class="text-danger">{{ $errors->first('id_skor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peniliaianAssesor.fields.id_skor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nilai">{{ trans('cruds.peniliaianAssesor.fields.nilai') }}</label>
                <input class="form-control {{ $errors->has('nilai') ? 'is-invalid' : '' }}" type="number" name="nilai" id="nilai" value="{{ old('nilai', $peniliaianAssesor->nilai) }}" step="1">
                @if($errors->has('nilai'))
                    <span class="text-danger">{{ $errors->first('nilai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peniliaianAssesor.fields.nilai_helper') }}</span>
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