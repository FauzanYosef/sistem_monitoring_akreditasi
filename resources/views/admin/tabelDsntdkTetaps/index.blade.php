@extends('layouts.admin')
@section('content')
@can('tabel_dsntdk_tetap_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-dsntdk-tetaps.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelDsntdkTetap.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelDsntdkTetap', 'route' => 'admin.tabel-dsntdk-tetaps.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelDsntdkTetap.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelDsntdkTetap">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.id') }}
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.pendidikan') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.guru_besar') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.lektor_kepala') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.lektor') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.asisten_ahli') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.tenaga_pengajar') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelDsntdkTetap.fields.jumlah') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelDsntdkTetaps as $key => $tabelDsntdkTetap)
                        <tr data-entry-id="{{ $tabelDsntdkTetap->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelDsntdkTetap->id ?? '' }}
                            </td>
                            <td>
                                {{ $tabelDsntdkTetap->tahun ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TabelDsntdkTetap::PENDIDIKAN_SELECT[$tabelDsntdkTetap->pendidikan] ?? '' }}
                            </td>
                            <td>
                                {{ $tabelDsntdkTetap->guru_besar ?? '' }}
                            </td>
                            <td>
                                {{ $tabelDsntdkTetap->lektor_kepala ?? '' }}
                            </td>
                            <td>
                                {{ $tabelDsntdkTetap->lektor ?? '' }}
                            </td>
                            <td>
                                {{ $tabelDsntdkTetap->asisten_ahli ?? '' }}
                            </td>
                            <td>
                                {{ $tabelDsntdkTetap->tenaga_pengajar ?? '' }}
                            </td>
                            <td>
                                {{ $tabelDsntdkTetap->jumlah ?? '' }}
                            </td>
                            <td>
                                @can('tabel_dsntdk_tetap_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-dsntdk-tetaps.show', $tabelDsntdkTetap->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_dsntdk_tetap_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-dsntdk-tetaps.edit', $tabelDsntdkTetap->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_dsntdk_tetap_delete')
                                    <form action="{{ route('admin.tabel-dsntdk-tetaps.destroy', $tabelDsntdkTetap->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_dsntdk_tetap_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-dsntdk-tetaps.massDestroy') }}",
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
  let table = $('.datatable-TabelDsntdkTetap:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection