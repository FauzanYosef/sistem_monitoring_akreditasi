@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penilaianIndikator.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penilaian-indikators.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.id') }}
                        </th>
                        <td>
                            {{ $penilaianIndikator->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.indikator_skor') }}
                        </th>
                        <td>
                            {{ $penilaianIndikator->indikator_skor->elemen ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.pilihan_penilaian') }}
                        </th>
                        <td>
                            {{ $penilaianIndikator->pilihan_penilaian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.label_nilai') }}
                        </th>
                        <td>
                            {{ $penilaianIndikator->label_nilai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.skor_nilai') }}
                        </th>
                        <td>
                            {{ $penilaianIndikator->skor_nilai }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penilaian-indikators.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection