@extends('layouts.admin')
@section('content')
@can('data_prodi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.data-prodis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dataProdi.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'DataProdi', 'route' => 'admin.data-prodis.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dataProdi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DataProdi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.id_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.kode_prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.kodeprodi.fields.kode_prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.jenjang_prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.telp_prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.email_prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.web_prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.alamat_prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataProdi.fields.status_prodi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataProdis as $key => $dataProdi)
                        <tr data-entry-id="{{ $dataProdi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dataProdi->id ?? '' }}
                            </td>
                            <td>
                                {{ $dataProdi->id_pt->nama_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataProdi->kode_prodi->nama_prodi ?? '' }}
                            </td>
                            <td>
                                {{ $dataProdi->kode_prodi->kode_prodi ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\DataProdi::JENJANG_PRODI_SELECT[$dataProdi->jenjang_prodi] ?? '' }}
                            </td>
                            <td>
                                {{ $dataProdi->telp_prodi ?? '' }}
                            </td>
                            <td>
                                {{ $dataProdi->email_prodi ?? '' }}
                            </td>
                            <td>
                                {{ $dataProdi->web_prodi ?? '' }}
                            </td>
                            <td>
                                {{ $dataProdi->alamat_prodi ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\DataProdi::STATUS_PRODI_SELECT[$dataProdi->status_prodi] ?? '' }}
                            </td>
                            <td>
                                @can('data_prodi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.data-prodis.show', $dataProdi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('data_prodi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.data-prodis.edit', $dataProdi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('data_prodi_delete')
                                    <form action="{{ route('admin.data-prodis.destroy', $dataProdi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('data_prodi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-prodis.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-DataProdi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection