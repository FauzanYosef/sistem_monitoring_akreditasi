@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tabelKerjasamaPt.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-kerjasama-pts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKerjasamaPt.fields.id') }}
                        </th>
                        <td>
                            {{ $tabelKerjasamaPt->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKerjasamaPt.fields.lembaga') }}
                        </th>
                        <td>
                            {{ $tabelKerjasamaPt->lembaga }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKerjasamaPt.fields.tingkat') }}
                        </th>
                        <td>
                            {{ App\Models\TabelKerjasamaPt::TINGKAT_SELECT[$tabelKerjasamaPt->tingkat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKerjasamaPt.fields.bentuk') }}
                        </th>
                        <td>
                            {{ $tabelKerjasamaPt->bentuk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKerjasamaPt.fields.bukti') }}
                        </th>
                        <td>
                            @foreach($tabelKerjasamaPt->bukti as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabelKerjasamaPt.fields.berlaku') }}
                        </th>
                        <td>
                            {{ $tabelKerjasamaPt->berlaku }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tabel-kerjasama-pts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection