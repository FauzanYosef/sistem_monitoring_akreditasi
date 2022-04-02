@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelDsntdkTetap.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-dsntdk-tetaps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelDsntdkTetap->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.pendidikan') }}
                        </th>
                        <td>
                            {{ App\Models\TabelDsntdkTetap::PENDIDIKAN_SELECT[$tabelDsntdkTetap->pendidikan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.guru_besar') }}
                        </th>
                        <td>
                            {{ $tabelDsntdkTetap->guru_besar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.lektor_kepala') }}
                        </th>
                        <td>
                            {{ $tabelDsntdkTetap->lektor_kepala }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.lektor') }}
                        </th>
                        <td>
                            {{ $tabelDsntdkTetap->lektor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.asisten_ahli') }}
                        </th>
                        <td>
                            {{ $tabelDsntdkTetap->asisten_ahli }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.tenaga_pengajar') }}
                        </th>
                        <td>
                            {{ $tabelDsntdkTetap->tenaga_pengajar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $tabelDsntdkTetap->jumlah }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-dsntdk-tetaps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection