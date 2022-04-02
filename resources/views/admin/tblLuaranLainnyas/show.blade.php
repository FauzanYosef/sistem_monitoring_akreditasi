@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tblLuaranLainnya.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-luaran-lainnyas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.id') }}
                        </th>
                        <td>
                            {{ $tblLuaranLainnya->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.hakcipta') }}
                        </th>
                        <td>
                            {{ App\Models\TblLuaranLainnya::HAKCIPTA_SELECT[$tblLuaranLainnya->hakcipta] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.penelitian') }}
                        </th>
                        <td>
                            {{ $tblLuaranLainnya->penelitian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.tahun') }}
                        </th>
                        <td>
                            {{ $tblLuaranLainnya->tahun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $tblLuaranLainnya->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tbl-luaran-lainnyas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection