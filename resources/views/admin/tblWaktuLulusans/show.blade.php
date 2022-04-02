@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblWaktuLulusan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-waktu-lulusans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblWaktuLulusan.fields.id') }}
                        </th>
                        <td>
                            {{ $tblWaktuLulusan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblWaktuLulusan.fields.program_pendidikan') }}
                        </th>
                        <td>
                            {{ App\Models\TblWaktuLulusan::PROGRAM_PENDIDIKAN_SELECT[$tblWaktuLulusan->program_pendidikan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_4') }}
                        </th>
                        <td>
                            {{ $tblWaktuLulusan->average_tunggu_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_3') }}
                        </th>
                        <td>
                            {{ $tblWaktuLulusan->average_tunggu_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblWaktuLulusan.fields.average_tunggu_2') }}
                        </th>
                        <td>
                            {{ $tblWaktuLulusan->average_tunggu_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-waktu-lulusans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection