@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblKepuasan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-kepuasans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblKepuasan.fields.id') }}
                        </th>
                        <td>
                            {{ $tblKepuasan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblKepuasan.fields.aspek_penilaian') }}
                        </th>
                        <td>
                            {{ App\Models\TblKepuasan::ASPEK_PENILAIAN_SELECT[$tblKepuasan->aspek_penilaian] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblKepuasan.fields.hasil_penilaian_4') }}
                        </th>
                        <td>
                            {{ $tblKepuasan->hasil_penilaian_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblKepuasan.fields.hasil_penilaian_3') }}
                        </th>
                        <td>
                            {{ $tblKepuasan->hasil_penilaian_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblKepuasan.fields.hasil_penilaian_2') }}
                        </th>
                        <td>
                            {{ $tblKepuasan->hasil_penilaian_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblKepuasan.fields.hasil_penilaian') }}
                        </th>
                        <td>
                            {{ $tblKepuasan->hasil_penilaian }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-kepuasans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection