@extends('layouts.admin')
@section('content')
@can('tbl_rasio_lulu_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tbl-rasio-lulus.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tblRasioLulu.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TblRasioLulu', 'route' => 'admin.tbl-rasio-lulus.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tblRasioLulu.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TblRasioLulu">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.tahun_masuk') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_6') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_5') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_mhs') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblRasioLulu.fields.jml_lulusan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblRasioLulus as $key => $tblRasioLulu)
                        <tr data-entry-id="{{ $tblRasioLulu->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tblRasioLulu->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblRasioLulu::PRODI_SELECT[$tblRasioLulu->prodi] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblRasioLulu::TAHUN_MASUK_SELECT[$tblRasioLulu->tahun_masuk] ?? '' }}
                            </td>
                            <td>
                                {{ $tblRasioLulu->jml_mhs_6 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRasioLulu->jml_mhs_5 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRasioLulu->jml_mhs_4 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRasioLulu->jml_mhs_3 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRasioLulu->jml_mhs_2 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRasioLulu->jml_mhs_1 ?? '' }}
                            </td>
                            <td>
                                {{ $tblRasioLulu->jml_mhs ?? '' }}
                            </td>
                            <td>
                                {{ $tblRasioLulu->jml_lulusan ?? '' }}
                            </td>
                            <td>
                                @can('tbl_rasio_lulu_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tbl-rasio-lulus.show', $tblRasioLulu->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tbl_rasio_lulu_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tbl-rasio-lulus.edit', $tblRasioLulu->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tbl_rasio_lulu_delete')
                                    <form action="{{ route('admin.tbl-rasio-lulus.destroy', $tblRasioLulu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tbl_rasio_lulu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tbl-rasio-lulus.massDestroy') }}",
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
  let table = $('.datatable-TblRasioLulu:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection