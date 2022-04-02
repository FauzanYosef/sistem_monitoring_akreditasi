@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelAuditKeuangan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-audit-keuangans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAuditKeuangan.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelAuditKeuangan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAuditKeuangan.fields.lembaga_audit') }}
                        </th>
                        <td>
                            {{ $tabelAuditKeuangan->lembaga_audit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAuditKeuangan.fields.tahun') }}
                        </th>
                        <td>
                            {{ $tabelAuditKeuangan->tahun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAuditKeuangan.fields.opini') }}
                        </th>
                        <td>
                            {{ $tabelAuditKeuangan->opini }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelAuditKeuangan.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $tabelAuditKeuangan->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-audit-keuangans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection