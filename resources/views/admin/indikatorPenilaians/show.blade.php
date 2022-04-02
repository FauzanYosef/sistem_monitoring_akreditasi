@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.indikatorPenilaian.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.indikator-penilaians.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.indikatorPenilaian.fields.id') }}
                        </th>
                        <td>
                            {{ $indikatorPenilaian->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indikatorPenilaian.fields.elemen') }}
                        </th>
                        <td>
                            {{ $indikatorPenilaian->elemen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indikatorPenilaian.fields.elemen_indikator') }}
                        </th>
                        <td>
                            {{ $indikatorPenilaian->elemen_indikator }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.indikator-penilaians.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection