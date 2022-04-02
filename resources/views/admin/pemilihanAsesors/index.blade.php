@extends('layouts.admin')
@section('content')
@can('pemilihan_asesor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pemilihan-asesors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pemilihanAsesor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pemilihanAsesor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PemilihanAsesor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pemilihanAsesor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemilihanAsesor.fields.prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemilihanAsesor.fields.id_assesor') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemilihanAsesor.fields.id_pemilihan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemilihanAsesors as $key => $pemilihanAsesor)
                        <tr data-entry-id="{{ $pemilihanAsesor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pemilihanAsesor->id ?? '' }}
                            </td>
                            <td>
                                {{ $pemilihanAsesor->prodi->nama_prodi ?? '' }}
                            </td>
                            <td>
                                {{ $pemilihanAsesor->id_assesor->nama_asesor ?? '' }}
                            </td>
                            <td>
                                {{ $pemilihanAsesor->id_pemilihan ?? '' }}
                            </td>
                            <td>
                                @can('pemilihan_asesor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pemilihan-asesors.show', $pemilihanAsesor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pemilihan_asesor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pemilihan-asesors.edit', $pemilihanAsesor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pemilihan_asesor_delete')
                                    <form action="{{ route('admin.pemilihan-asesors.destroy', $pemilihanAsesor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pemilihan_asesor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pemilihan-asesors.massDestroy') }}",
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
  let table = $('.datatable-PemilihanAsesor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection