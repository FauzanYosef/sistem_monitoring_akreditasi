@extends('layouts.admin')
@section('content')
@can('tabel_pkm_dsn_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-pkm-dsns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelPkmDsn.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelPkmDsn', 'route' => 'admin.tabel-pkm-dsns.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelPkmDsn.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelPkmDsn">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.sumber_biaya') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.jml_judul_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.jml_judul_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.jml_judul_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelPkmDsn.fields.jumlah') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelPkmDsns as $key => $tabelPkmDsn)
                        <tr data-entry-id="{{ $tabelPkmDsn->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelPkmDsn->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TabelPkmDsn::SUMBER_BIAYA_SELECT[$tabelPkmDsn->sumber_biaya] ?? '' }}
                            </td>
                            <td>
                                {{ $tabelPkmDsn->jml_judul_1 ?? '' }}
                            </td>
                            <td>
                                {{ $tabelPkmDsn->jml_judul_2 ?? '' }}
                            </td>
                            <td>
                                {{ $tabelPkmDsn->jml_judul_3 ?? '' }}
                            </td>
                            <td>
                                {{ $tabelPkmDsn->jumlah ?? '' }}
                            </td>
                            <td>
                                @can('tabel_pkm_dsn_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-pkm-dsns.show', $tabelPkmDsn->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_pkm_dsn_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-pkm-dsns.edit', $tabelPkmDsn->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_pkm_dsn_delete')
                                    <form action="{{ route('admin.tabel-pkm-dsns.destroy', $tabelPkmDsn->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_pkm_dsn_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-pkm-dsns.massDestroy') }}",
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
    pageLength: 50,
  });
  let table = $('.datatable-TabelPkmDsn:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection