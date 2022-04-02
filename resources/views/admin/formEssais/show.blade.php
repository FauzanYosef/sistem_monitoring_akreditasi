@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.formEssai.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.form-essais.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.formEssai.fields.id') }}
                        </th>
                        <td>
                            {{ $formEssai->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formEssai.fields.elemen') }}
                        </th>
                        <td>
                            {{ $formEssai->elemen->elemen ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formEssai.fields.isi_essai') }}
                        </th>
                        <td>
                            {{ $formEssai->isi_essai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formEssai.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $formEssai->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.form-essais.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection