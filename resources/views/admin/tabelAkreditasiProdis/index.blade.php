@extends('layouts.admin')
@section('content')
@can('tabel_akreditasi_prodi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-akreditasi-prodis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelAkreditasiProdi.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelAkreditasiProdi', 'route' => 'admin.tabel-akreditasi-prodis.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelAkreditasiProdi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelAkreditasiProdi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.id') }}
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.lembaga_akreditasi_internasional') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.prodi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.peringkat') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.masa_berlaku') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelAkreditasiProdi.fields.keterangan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelAkreditasiProdis as $key => $tabelAkreditasiProdi)
                        <tr data-entry-id="{{ $tabelAkreditasiProdi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelAkreditasiProdi->id ?? '' }}
                            </td>
                            <td>
                                {{ $tabelAkreditasiProdi->tahun ?? '' }}
                            </td>
                            <td>
                                {{ $tabelAkreditasiProdi->lembaga_akreditasi_internasional ?? '' }}
                            </td>
                            <td>
                                {{ $tabelAkreditasiProdi->nama_prodi ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TabelAkreditasiProdi::PERINGKAT_SELECT[$tabelAkreditasiProdi->peringkat] ?? '' }}
                            </td>
                            <td>
                                {{ $tabelAkreditasiProdi->masa_berlaku ?? '' }}
                            </td>
                            <td>
                                {{ $tabelAkreditasiProdi->keterangan ?? '' }}
                            </td>
                            <td>
                                @can('tabel_akreditasi_prodi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-akreditasi-prodis.show', $tabelAkreditasiProdi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_akreditasi_prodi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-akreditasi-prodis.edit', $tabelAkreditasiProdi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_akreditasi_prodi_delete')
                                    <form action="{{ route('admin.tabel-akreditasi-prodis.destroy', $tabelAkreditasiProdi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_akreditasi_prodi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-akreditasi-prodis.massDestroy') }}",
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
  let table = $('.datatable-TabelAkreditasiProdi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection