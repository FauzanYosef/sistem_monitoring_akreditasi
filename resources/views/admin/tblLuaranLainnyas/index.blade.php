@extends('layouts.admin')
@section('content')
@can('tbl_luaran_lainnya_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tbl-luaran-lainnyas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tblLuaranLainnya.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TblLuaranLainnya', 'route' => 'admin.tbl-luaran-lainnyas.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tblLuaranLainnya.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TblLuaranLainnya">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.hakcipta') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.penelitian') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.tahun') }}
                        </th>
                        <th>
                            {{ trans('cruds.tblLuaranLainnya.fields.keterangan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblLuaranLainnyas as $key => $tblLuaranLainnya)
                        <tr data-entry-id="{{ $tblLuaranLainnya->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tblLuaranLainnya->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TblLuaranLainnya::HAKCIPTA_SELECT[$tblLuaranLainnya->hakcipta] ?? '' }}
                            </td>
                            <td>
                                {{ $tblLuaranLainnya->penelitian ?? '' }}
                            </td>
                            <td>
                                {{ $tblLuaranLainnya->tahun ?? '' }}
                            </td>
                            <td>
                                {{ $tblLuaranLainnya->keterangan ?? '' }}
                            </td>
                            <td>
                                @can('tbl_luaran_lainnya_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tbl-luaran-lainnyas.show', $tblLuaranLainnya->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tbl_luaran_lainnya_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tbl-luaran-lainnyas.edit', $tblLuaranLainnya->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tbl_luaran_lainnya_delete')
                                    <form action="{{ route('admin.tbl-luaran-lainnyas.destroy', $tblLuaranLainnya->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tbl_luaran_lainnya_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tbl-luaran-lainnyas.massDestroy') }}",
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
  let table = $('.datatable-TblLuaranLainnya:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection