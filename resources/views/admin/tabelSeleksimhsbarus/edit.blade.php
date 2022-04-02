@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelSeleksimhsbaru.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-seleksimhsbarus.update", [$tabelSeleksimhsbaru->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="program_studi">{{ trans('cruds.tabelSeleksimhsbaru.fields.program_studi') }}</label>
                <input class="form-control {{ $errors->has('program_studi') ? 'is-invalid' : '' }}" type="text" name="program_studi" id="program_studi" value="{{ old('program_studi', $tabelSeleksimhsbaru->program_studi) }}">
                @if($errors->has('program_studi'))
                    <span class="text-danger">{{ $errors->first('program_studi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.program_studi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tahun_akademik">{{ trans('cruds.tabelSeleksimhsbaru.fields.tahun_akademik') }}</label>
                <input class="form-control {{ $errors->has('tahun_akademik') ? 'is-invalid' : '' }}" type="text" name="tahun_akademik" id="tahun_akademik" value="{{ old('tahun_akademik', $tabelSeleksimhsbaru->tahun_akademik) }}">
                @if($errors->has('tahun_akademik'))
                    <span class="text-danger">{{ $errors->first('tahun_akademik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.tahun_akademik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="daya_tampung">{{ trans('cruds.tabelSeleksimhsbaru.fields.daya_tampung') }}</label>
                <input class="form-control {{ $errors->has('daya_tampung') ? 'is-invalid' : '' }}" type="number" name="daya_tampung" id="daya_tampung" value="{{ old('daya_tampung', $tabelSeleksimhsbaru->daya_tampung) }}" step="1">
                @if($errors->has('daya_tampung'))
                    <span class="text-danger">{{ $errors->first('daya_tampung') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.daya_tampung_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah_calon_pendaftar">{{ trans('cruds.tabelSeleksimhsbaru.fields.jumlah_calon_pendaftar') }}</label>
                <input class="form-control {{ $errors->has('jumlah_calon_pendaftar') ? 'is-invalid' : '' }}" type="number" name="jumlah_calon_pendaftar" id="jumlah_calon_pendaftar" value="{{ old('jumlah_calon_pendaftar', $tabelSeleksimhsbaru->jumlah_calon_pendaftar) }}" step="1">
                @if($errors->has('jumlah_calon_pendaftar'))
                    <span class="text-danger">{{ $errors->first('jumlah_calon_pendaftar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.jumlah_calon_pendaftar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah_lulus_seleksi">{{ trans('cruds.tabelSeleksimhsbaru.fields.jumlah_lulus_seleksi') }}</label>
                <input class="form-control {{ $errors->has('jumlah_lulus_seleksi') ? 'is-invalid' : '' }}" type="number" name="jumlah_lulus_seleksi" id="jumlah_lulus_seleksi" value="{{ old('jumlah_lulus_seleksi', $tabelSeleksimhsbaru->jumlah_lulus_seleksi) }}" step="1">
                @if($errors->has('jumlah_lulus_seleksi'))
                    <span class="text-danger">{{ $errors->first('jumlah_lulus_seleksi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.jumlah_lulus_seleksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_baru_reguler">{{ trans('cruds.tabelSeleksimhsbaru.fields.jml_mhs_baru_reguler') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_baru_reguler') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_baru_reguler" id="jml_mhs_baru_reguler" value="{{ old('jml_mhs_baru_reguler', $tabelSeleksimhsbaru->jml_mhs_baru_reguler) }}" step="1">
                @if($errors->has('jml_mhs_baru_reguler'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_baru_reguler') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.jml_mhs_baru_reguler_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jml_mhs_transfer">{{ trans('cruds.tabelSeleksimhsbaru.fields.jml_mhs_transfer') }}</label>
                <input class="form-control {{ $errors->has('jml_mhs_transfer') ? 'is-invalid' : '' }}" type="number" name="jml_mhs_transfer" id="jml_mhs_transfer" value="{{ old('jml_mhs_transfer', $tabelSeleksimhsbaru->jml_mhs_transfer) }}" step="1">
                @if($errors->has('jml_mhs_transfer'))
                    <span class="text-danger">{{ $errors->first('jml_mhs_transfer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.jml_mhs_transfer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_mhs_reguler">{{ trans('cruds.tabelSeleksimhsbaru.fields.total_mhs_reguler') }}</label>
                <input class="form-control {{ $errors->has('total_mhs_reguler') ? 'is-invalid' : '' }}" type="number" name="total_mhs_reguler" id="total_mhs_reguler" value="{{ old('total_mhs_reguler', $tabelSeleksimhsbaru->total_mhs_reguler) }}" step="1">
                @if($errors->has('total_mhs_reguler'))
                    <span class="text-danger">{{ $errors->first('total_mhs_reguler') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.total_mhs_reguler_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_mhs_transfer">{{ trans('cruds.tabelSeleksimhsbaru.fields.total_mhs_transfer') }}</label>
                <input class="form-control {{ $errors->has('total_mhs_transfer') ? 'is-invalid' : '' }}" type="number" name="total_mhs_transfer" id="total_mhs_transfer" value="{{ old('total_mhs_transfer', $tabelSeleksimhsbaru->total_mhs_transfer) }}" step="1">
                @if($errors->has('total_mhs_transfer'))
                    <span class="text-danger">{{ $errors->first('total_mhs_transfer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelSeleksimhsbaru.fields.total_mhs_transfer_helper') }}</span>
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