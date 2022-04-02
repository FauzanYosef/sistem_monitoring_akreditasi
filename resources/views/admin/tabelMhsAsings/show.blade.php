@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelMhsAsing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-mhs-asings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelMhsAsing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.prodi') }}
                        </th>
                        <td>
                            {{ $tabelMhsAsing->prodi->nama_prodi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.ts_2') }}
                        </th>
                        <td>
                            {{ $tabelMhsAsing->ts_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.ts_1') }}
                        </th>
                        <td>
                            {{ $tabelMhsAsing->ts_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.ts') }}
                        </th>
                        <td>
                            {{ $tabelMhsAsing->ts }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-mhs-asings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection