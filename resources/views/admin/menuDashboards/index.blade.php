@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.menuDashboard.title') }}
    </div>

    <div class="card-body">
    @if(session('status'))
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DataPengajuan">
                <thead>
                    <tr>
                        <th>
                            Tahun
                        </th>
                        <th>
                            Nama PT
                        </th>
                        <th>
                            Nama Prodi
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPengajuans as $key => $dataPengajuan)
                        <tr data-entry-id="{{ $dataPengajuan->id }}">
                            <td>
                                {{ $dataPengajuan->tahun_pengajuan ?? '' }}
                            </td>
                            <td>
                                {{ $dataPengajuan->nama_pt ?? '' }}
                            </td>
                            <td>
                                {{ $dataPengajuan->nama_prodi ?? '' }}
                            </td>
                            <td>
                                @can('menu_dashboard_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.menu-dashboards.show', $dataPengajuan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('menu_dashboard_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.menu-dashboards.massDestroy') }}",
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
  let table = $('.datatable-MenuDashboard:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection