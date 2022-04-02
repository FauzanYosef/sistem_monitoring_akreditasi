@extends('layouts.admin')
@section('content')
@can('tbl_referensi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tbl-referensis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tblReferensi.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TblReferensi', 'route' => 'admin.tbl-referensis.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tblReferensi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TblReferensi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.program_pendidikan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.banyak_lulusan_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.banyak_lulusan_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.banyak_lulusan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.nilai_lulusan_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.nilai_lulusan_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblReferensi.fields.nilai_lulusan_1') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblReferensis as $key => $tblReferensi)
                        <tr data-entry-id="{{ $tblReferensi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tblReferensi->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblReferensi::PROGRAM_PENDIDIKAN_SELECT[$tblReferensi->program_pendidikan] ?? '' }}
                            </td>
                            <td>
                                {{ $tblReferensi->banyak_lulusan_3 ?? '' }}
                            </td>
                            <td>
                                {{ $tblReferensi->banyak_lulusan_2 ?? '' }}
                            </td>
                            <td>
                                {{ $tblReferensi->banyak_lulusan ?? '' }}
                            </td>
                            <td>
                                {{ $tblReferensi->nilai_lulusan_3 ?? '' }}
                            </td>
                            <td>
                                {{ $tblReferensi->nilai_lulusan_2 ?? '' }}
                            </td>
                            <td>
                                {{ $tblReferensi->nilai_lulusan_1 ?? '' }}
                            </td>
                            <td>
                                @can('tbl_referensi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tbl-referensis.show', $tblReferensi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tbl_referensi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tbl-referensis.edit', $tblReferensi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tbl_referensi_delete')
                                    <form action="{{ route('admin.tbl-referensis.destroy', $tblReferensi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tbl_referensi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tbl-referensis.massDestroy') }}",
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
  let table = $('.datatable-TblReferensi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection