@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelKckpanDsn.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-kckpan-dsns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelKckpanDsn->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.pengelola') }}
                        </th>
                        <td>
                            {{ App\Models\TabelKckpanDsn::PENGELOLA_SELECT[$tabelKckpanDsn->pengelola] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.doktor') }}
                        </th>
                        <td>
                            {{ $tabelKckpanDsn->doktor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.magister') }}
                        </th>
                        <td>
                            {{ $tabelKckpanDsn->magister }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.profesi') }}
                        </th>
                        <td>
                            {{ $tabelKckpanDsn->profesi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $tabelKckpanDsn->jumlah }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-kckpan-dsns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection