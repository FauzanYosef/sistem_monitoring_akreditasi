@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelPenelitianDosen.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-penelitian-dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPenelitianDosen.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelPenelitianDosen->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPenelitianDosen.fields.sumber_biaya') }}
                        </th>
                        <td>
                            {{ App\Models\TabelPenelitianDosen::SUMBER_BIAYA_SELECT[$tabelPenelitianDosen->sumber_biaya] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPenelitianDosen.fields.jml_judul_1') }}
                        </th>
                        <td>
                            {{ $tabelPenelitianDosen->jml_judul_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPenelitianDosen.fields.jml_judul_2') }}
                        </th>
                        <td>
                            {{ $tabelPenelitianDosen->jml_judul_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPenelitianDosen.fields.jml_judul_3') }}
                        </th>
                        <td>
                            {{ $tabelPenelitianDosen->jml_judul_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelPenelitianDosen.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $tabelPenelitianDosen->jumlah }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-penelitian-dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection