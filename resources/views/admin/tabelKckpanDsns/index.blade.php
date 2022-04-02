@extends('layouts.admin')
@section('content')
@can('tabel_kckpan_dsn_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-kckpan-dsns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelKckpanDsn.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelKckpanDsn', 'route' => 'admin.tabel-kckpan-dsns.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelKckpanDsn.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelKckpanDsn">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.id') }}
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.pengelola') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.doktor') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.magister') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.profesi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelKckpanDsn.fields.jumlah') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelKckpanDsns as $key => $tabelKckpanDsn)
                        <tr data-entry-id="{{ $tabelKckpanDsn->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelKckpanDsn->id ?? '' }}
                            </td>
                            <td>
                                {{ $tabelKckpanDsn->tahun ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TabelKckpanDsn::PENGELOLA_SELECT[$tabelKckpanDsn->pengelola] ?? '' }}
                            </td>
                            <td>
                                {{ $tabelKckpanDsn->doktor ?? '' }}
                            </td>
                            <td>
                                {{ $tabelKckpanDsn->magister ?? '' }}
                            </td>
                            <td>
                                {{ $tabelKckpanDsn->profesi ?? '' }}
                            </td>
                            <td>
                                {{ $tabelKckpanDsn->jumlah ?? '' }}
                            </td>
                            <td>
                                @can('tabel_kckpan_dsn_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-kckpan-dsns.show', $tabelKckpanDsn->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_kckpan_dsn_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-kckpan-dsns.edit', $tabelKckpanDsn->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_kckpan_dsn_delete')
                                    <form action="{{ route('admin.tabel-kckpan-dsns.destroy', $tabelKckpanDsn->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_kckpan_dsn_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-kckpan-dsns.massDestroy') }}",
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
  let table = $('.datatable-TabelKckpanDsn:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection