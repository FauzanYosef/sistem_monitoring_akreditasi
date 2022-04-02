@extends('layouts.admin')
@section('content')
@can('kodeprodi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.kodeprodis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.kodeprodi.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.kodeprodi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Kodeprodi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.kodeprodi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.kodeprodi.fields.kode_prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.kodeprodi.fields.nama_prodi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kodeprodis as $key => $kodeprodi)
                        <tr data-entry-id="{{ $kodeprodi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $kodeprodi->id ?? '' }}
                            </td>
                            <td>
                                {{ $kodeprodi->kode_prodi ?? '' }}
                            </td>
                            <td>
                                {{ $kodeprodi->nama_prodi ?? '' }}
                            </td>
                            <td>
                                @can('kodeprodi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.kodeprodis.show', $kodeprodi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('kodeprodi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.kodeprodis.edit', $kodeprodi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('kodeprodi_delete')
                                    <form action="{{ route('admin.kodeprodis.destroy', $kodeprodi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('kodeprodi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kodeprodis.massDestroy') }}",
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
  let table = $('.datatable-Kodeprodi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection