@extends('layouts.admin')
@section('content')
@can('tbl_lama_studi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tbl-lama-studis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tblLamaStudi.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TblLamaStudi', 'route' => 'admin.tbl-lama-studis.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tblLamaStudi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TblLamaStudi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.program_pendidikan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.jumlah_ps') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.jml_lulusan_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.jml_lulusan_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.jml_lulusan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.average_masa_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.average_masa_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLamaStudi.fields.average_masa') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblLamaStudis as $key => $tblLamaStudi)
                        <tr data-entry-id="{{ $tblLamaStudi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tblLamaStudi->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblLamaStudi::PROGRAM_PENDIDIKAN_SELECT[$tblLamaStudi->program_pendidikan] ?? '' }}
                            </td>
                            <td>
                                {{ $tblLamaStudi->jumlah_ps ?? '' }}
                            </td>
                            <td>
                                {{ $tblLamaStudi->jml_lulusan_2 ?? '' }}
                            </td>
                            <td>
                                {{ $tblLamaStudi->jml_lulusan_1 ?? '' }}
                            </td>
                            <td>
                                {{ $tblLamaStudi->jml_lulusan ?? '' }}
                            </td>
                            <td>
                                {{ $tblLamaStudi->average_masa_2 ?? '' }}
                            </td>
                            <td>
                                {{ $tblLamaStudi->average_masa_1 ?? '' }}
                            </td>
                            <td>
                                {{ $tblLamaStudi->average_masa ?? '' }}
                            </td>
                            <td>
                                @can('tbl_lama_studi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tbl-lama-studis.show', $tblLamaStudi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tbl_lama_studi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tbl-lama-studis.edit', $tblLamaStudi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tbl_lama_studi_delete')
                                    <form action="{{ route('admin.tbl-lama-studis.destroy', $tblLamaStudi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tbl_lama_studi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tbl-lama-studis.massDestroy') }}",
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
  let table = $('.datatable-TblLamaStudi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection