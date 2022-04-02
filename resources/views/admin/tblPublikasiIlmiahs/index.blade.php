@extends('layouts.admin')
@section('content')
@can('tbl_publikasi_ilmiah_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tbl-publikasi-ilmiahs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tblPublikasiIlmiah.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TblPublikasiIlmiah', 'route' => 'admin.tbl-publikasi-ilmiahs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tblPublikasiIlmiah.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TblPublikasiIlmiah">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jenis_publikasi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jml_judul_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPublikasiIlmiah.fields.jumlah') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblPublikasiIlmiahs as $key => $tblPublikasiIlmiah)
                        <tr data-entry-id="{{ $tblPublikasiIlmiah->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tblPublikasiIlmiah->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblPublikasiIlmiah::JENIS_PUBLIKASI_SELECT[$tblPublikasiIlmiah->jenis_publikasi] ?? '' }}
                            </td>
                            <td>
                                {{ $tblPublikasiIlmiah->jml_judul_1 ?? '' }}
                            </td>
                            <td>
                                {{ $tblPublikasiIlmiah->jml_judul_2 ?? '' }}
                            </td>
                            <td>
                                {{ $tblPublikasiIlmiah->jml_judul_3 ?? '' }}
                            </td>
                            <td>
                                {{ $tblPublikasiIlmiah->jumlah ?? '' }}
                            </td>
                            <td>
                                @can('tbl_publikasi_ilmiah_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tbl-publikasi-ilmiahs.show', $tblPublikasiIlmiah->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tbl_publikasi_ilmiah_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tbl-publikasi-ilmiahs.edit', $tblPublikasiIlmiah->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tbl_publikasi_ilmiah_delete')
                                    <form action="{{ route('admin.tbl-publikasi-ilmiahs.destroy', $tblPublikasiIlmiah->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tbl_publikasi_ilmiah_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tbl-publikasi-ilmiahs.massDestroy') }}",
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
  let table = $('.datatable-TblPublikasiIlmiah:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection