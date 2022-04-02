@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.peniliaianAssesor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.peniliaian-assesors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.peniliaianAssesor.fields.id') }}
                        </th>
                        <td>
                            {{ $peniliaianAssesor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peniliaianAssesor.fields.id_assesor') }}
                        </th>
                        <td>
                            {{ $peniliaianAssesor->id_assesor->id_pemilihan ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peniliaianAssesor.fields.id_skor') }}
                        </th>
                        <td>
                            {{ $peniliaianAssesor->id_skor->pilihan_penilaian ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peniliaianAssesor.fields.nilai') }}
                        </th>
                        <td>
                            {{ $peniliaianAssesor->nilai }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.peniliaian-assesors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection