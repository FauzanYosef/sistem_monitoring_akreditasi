@extends('layouts.admin')
@section('content')
@can('tabel_mhs_asing_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-mhs-asings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelMhsAsing.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelMhsAsing', 'route' => 'admin.tabel-mhs-asings.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelMhsAsing.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelMhsAsing">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.id') }}
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.ts_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.ts_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelMhsAsing.fields.ts') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelMhsAsings as $key => $tabelMhsAsing)
                        <tr data-entry-id="{{ $tabelMhsAsing->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelMhsAsing->id ?? '' }}
                            </td>
                            <td>
                                {{ $tabelMhsAsing->tahun ?? '' }}
                            </td>
                            <td>
                                {{ $tabelMhsAsing->prodi->nama_prodi ?? '' }}
                            </td>
                            <td>
                                {{ $tabelMhsAsing->ts_2 ?? '' }}
                            </td>
                            <td>
                                {{ $tabelMhsAsing->ts_1 ?? '' }}
                            </td>
                            <td>
                                {{ $tabelMhsAsing->ts ?? '' }}
                            </td>
                            <td>
                                @can('tabel_mhs_asing_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-mhs-asings.show', $tabelMhsAsing->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_mhs_asing_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-mhs-asings.edit', $tabelMhsAsing->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_mhs_asing_delete')
                                    <form action="{{ route('admin.tabel-mhs-asings.destroy', $tabelMhsAsing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_mhs_asing_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-mhs-asings.massDestroy') }}",
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
  let table = $('.datatable-TabelMhsAsing:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection