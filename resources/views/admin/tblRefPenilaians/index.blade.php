@extends('layouts.admin')
@section('content')
@can('tbl_ref_penilaian_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tbl-ref-penilaians.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tblRefPenilaian.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TblRefPenilaian', 'route' => 'admin.tbl-ref-penilaians.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tblRefPenilaian.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TblRefPenilaian">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.program_pendidikan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jml_lulusan_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jml_lulusan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRefPenilaian.fields.jwb_lulusan_2') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblRefPenilaians as $key => $tblRefPenilaian)
                        <tr data-entry-id="{{ $tblRefPenilaian->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tblRefPenilaian->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblRefPenilaian::PROGRAM_PENDIDIKAN_SELECT[$tblRefPenilaian->program_pendidikan] ?? '' }}
                            </td>
                            <td>
                                {{ $tblRefPenilaian->jml_lulusan_4 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRefPenilaian->jml_lulusan_3 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRefPenilaian->jml_lulusan ?? '' }}
                            </td>
                            <td>
                                {{ $tblRefPenilaian->jwb_lulusan_4 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRefPenilaian->jwb_lulusan_3 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRefPenilaian->jwb_lulusan_2 ?? '' }}
                            </td>
                            <td>
                                @can('tbl_ref_penilaian_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tbl-ref-penilaians.show', $tblRefPenilaian->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tbl_ref_penilaian_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tbl-ref-penilaians.edit', $tblRefPenilaian->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tbl_ref_penilaian_delete')
                                    <form action="{{ route('admin.tbl-ref-penilaians.destroy', $tblRefPenilaian->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tbl_ref_penilaian_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tbl-ref-penilaians.massDestroy') }}",
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
  let table = $('.datatable-TblRefPenilaian:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection