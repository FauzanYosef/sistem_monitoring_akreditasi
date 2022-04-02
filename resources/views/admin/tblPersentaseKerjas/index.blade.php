@extends('layouts.admin')
@section('content')
@can('tbl_persentase_kerja_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tbl-persentase-kerjas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tblPersentaseKerja.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TblPersentaseKerja', 'route' => 'admin.tbl-persentase-kerjas.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tblPersentaseKerja.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TblPersentaseKerja">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tblPersentaseKerja.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPersentaseKerja.fields.program_pendidikan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPersentaseKerja.fields.persen_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPersentaseKerja.fields.persen_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblPersentaseKerja.fields.persen_2') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblPersentaseKerjas as $key => $tblPersentaseKerja)
                        <tr data-entry-id="{{ $tblPersentaseKerja->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tblPersentaseKerja->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblPersentaseKerja::PROGRAM_PENDIDIKAN_SELECT[$tblPersentaseKerja->program_pendidikan] ?? '' }}
                            </td>
                            <td>
                                {{ $tblPersentaseKerja->persen_4 ?? '' }}
                            </td>
                            <td>
                                {{ $tblPersentaseKerja->persen_3 ?? '' }}
                            </td>
                            <td>
                                {{ $tblPersentaseKerja->persen_2 ?? '' }}
                            </td>
                            <td>
                                @can('tbl_persentase_kerja_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tbl-persentase-kerjas.show', $tblPersentaseKerja->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tbl_persentase_kerja_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tbl-persentase-kerjas.edit', $tblPersentaseKerja->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tbl_persentase_kerja_delete')
                                    <form action="{{ route('admin.tbl-persentase-kerjas.destroy', $tblPersentaseKerja->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tbl_persentase_kerja_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tbl-persentase-kerjas.massDestroy') }}",
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
  let table = $('.datatable-TblPersentaseKerja:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection