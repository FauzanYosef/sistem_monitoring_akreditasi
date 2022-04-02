@extends('layouts.admin')
@section('content')
@can('data_asesor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.data-asesors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dataAsesor.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'DataAsesor', 'route' => 'admin.data-asesors.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dataAsesor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DataAsesor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.nip_assesor') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.nama_asesor') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.email_assesor') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataAsesor.fields.telp_asesor') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataAsesors as $key => $dataAsesor)
                        <tr data-entry-id="{{ $dataAsesor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dataAsesor->id ?? '' }}
                            </td>
                            <td>
                                {{ $dataAsesor->nip_assesor ?? '' }}
                            </td>
                            <td>
                                {{ $dataAsesor->nama_asesor ?? '' }}
                            </td>
                            <td>
                                {{ $dataAsesor->email_assesor ?? '' }}
                            </td>
                            <td>
                                {{ $dataAsesor->telp_asesor ?? '' }}
                            </td>
                            <td>
                                @can('data_asesor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.data-asesors.show', $dataAsesor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('data_asesor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.data-asesors.edit', $dataAsesor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('data_asesor_delete')
                                    <form action="{{ route('admin.data-asesors.destroy', $dataAsesor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('data_asesor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-asesors.massDestroy') }}",
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
  let table = $('.datatable-DataAsesor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection