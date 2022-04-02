@extends('layouts.admin')
@section('content')
@can('tabel_rasio_dsn_mh_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-rasio-dsn-mhs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelRasioDsnMh.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelRasioDsnMh', 'route' => 'admin.tabel-rasio-dsn-mhs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelRasioDsnMh.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelRasioDsnMh">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.unit_pengelola') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.jml_dosen') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.jml_mhs') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelRasioDsnMh.fields.jml_mhs_ta') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelRasioDsnMhs as $key => $tabelRasioDsnMh)
                        <tr data-entry-id="{{ $tabelRasioDsnMh->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelRasioDsnMh->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TabelRasioDsnMh::UNIT_PENGELOLA_SELECT[$tabelRasioDsnMh->unit_pengelola] ?? '' }}
                            </td>
                            <td>
                                {{ $tabelRasioDsnMh->jml_dosen ?? '' }}
                            </td>
                            <td>
                                {{ $tabelRasioDsnMh->jml_mhs ?? '' }}
                            </td>
                            <td>
                                {{ $tabelRasioDsnMh->jml_mhs_ta ?? '' }}
                            </td>
                            <td>
                                @can('tabel_rasio_dsn_mh_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-rasio-dsn-mhs.show', $tabelRasioDsnMh->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_rasio_dsn_mh_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-rasio-dsn-mhs.edit', $tabelRasioDsnMh->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_rasio_dsn_mh_delete')
                                    <form action="{{ route('admin.tabel-rasio-dsn-mhs.destroy', $tabelRasioDsnMh->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_rasio_dsn_mh_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-rasio-dsn-mhs.massDestroy') }}",
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
  let table = $('.datatable-TabelRasioDsnMh:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection