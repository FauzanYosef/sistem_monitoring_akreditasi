@extends('layouts.admin')
@section('content')
@can('tbl_prestasi_non_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tbl-prestasi-nons.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tblPrestasiNon.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TblPrestasiNon', 'route' => 'admin.tbl-prestasi-nons.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tblPrestasiNon.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TblPrestasiNon">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.nama_kegiatan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.waktu') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.tingkat') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPrestasiNon.fields.prestasi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblPrestasiNons as $key => $tblPrestasiNon)
                        <tr data-entry-id="{{ $tblPrestasiNon->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tblPrestasiNon->id ?? '' }}
                            </td>
                            <td>
                                {{ $tblPrestasiNon->nama_kegiatan ?? '' }}
                            </td>
                            <td>
                                {{ $tblPrestasiNon->waktu ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblPrestasiNon::TINGKAT_SELECT[$tblPrestasiNon->tingkat] ?? '' }}
                            </td>
                            <td>
                                {{ $tblPrestasiNon->prestasi ?? '' }}
                            </td>
                            <td>
                                @can('tbl_prestasi_non_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tbl-prestasi-nons.show', $tblPrestasiNon->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tbl_prestasi_non_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tbl-prestasi-nons.edit', $tblPrestasiNon->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tbl_prestasi_non_delete')
                                    <form action="{{ route('admin.tbl-prestasi-nons.destroy', $tblPrestasiNon->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tbl_prestasi_non_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tbl-prestasi-nons.massDestroy') }}",
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
  let table = $('.datatable-TblPrestasiNon:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection