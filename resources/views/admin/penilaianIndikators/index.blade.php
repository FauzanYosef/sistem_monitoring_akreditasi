@extends('layouts.admin')
@section('content')
@can('penilaian_indikator_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.penilaian-indikators.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.penilaianIndikator.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PenilaianIndikator', 'route' => 'admin.penilaian-indikators.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.penilaianIndikator.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PenilaianIndikator">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.indikator_skor') }}
                        </th>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.pilihan_penilaian') }}
                        </th>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.label_nilai') }}
                        </th>
                        <th>
                            {{ trans('cruds.penilaianIndikator.fields.skor_nilai') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penilaianIndikators as $key => $penilaianIndikator)
                        <tr data-entry-id="{{ $penilaianIndikator->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $penilaianIndikator->id ?? '' }}
                            </td>
                            <td>
                                {{ $penilaianIndikator->indikator_skor->elemen ?? '' }}
                            </td>
                            <td>
                                {{ $penilaianIndikator->pilihan_penilaian ?? '' }}
                            </td>
                            <td>
                                {{ $penilaianIndikator->label_nilai ?? '' }}
                            </td>
                            <td>
                                {{ $penilaianIndikator->skor_nilai ?? '' }}
                            </td>
                            <td>
                                @can('penilaian_indikator_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.penilaian-indikators.show', $penilaianIndikator->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('penilaian_indikator_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.penilaian-indikators.edit', $penilaianIndikator->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('penilaian_indikator_delete')
                                    <form action="{{ route('admin.penilaian-indikators.destroy', $penilaianIndikator->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('penilaian_indikator_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.penilaian-indikators.massDestroy') }}",
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
  let table = $('.datatable-PenilaianIndikator:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection