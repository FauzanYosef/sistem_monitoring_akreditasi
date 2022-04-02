@extends('layouts.admin')
@section('content')
@can('data_pt_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.data-pts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dataPt.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'DataPt', 'route' => 'admin.data-pts.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dataPt.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DataPt">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.kode_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.nama_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.jenis_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.jenis_pengelolaan') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.status_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.alamat_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.no_telp_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.email_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.web_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.no_sk_pendirian_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.tgl_sk_pendirian_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.peringkat_akre_pt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.no_sk_banpt') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPt.fields.ts_pt') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPts as $key => $dataPt)
                        <tr data-entry-id="{{ $dataPt->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dataPt->id ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->kode_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->nama_pt ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\DataPt::JENIS_PT_SELECT[$dataPt->jenis_pt] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\DataPt::JENIS_PENGELOLAAN_SELECT[$dataPt->jenis_pengelolaan] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\DataPt::STATUS_PT_SELECT[$dataPt->status_pt] ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->alamat_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->no_telp_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->email_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->web_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->no_sk_pendirian_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->tgl_sk_pendirian_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->peringkat_akre_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->no_sk_banpt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPt->ts_pt ?? '' }}
                            </td>
                            <td>
                                @can('data_pt_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.data-pts.show', $dataPt->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('data_pt_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.data-pts.edit', $dataPt->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('data_pt_delete')
                                    <form action="{{ route('admin.data-pts.destroy', $dataPt->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('data_pt_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-pts.massDestroy') }}",
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
  let table = $('.datatable-DataPt:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection