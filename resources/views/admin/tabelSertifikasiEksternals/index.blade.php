@extends('layouts.admin')
@section('content')
@can('tabel_sertifikasi_eksternal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-sertifikasi-eksternals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelSertifikasiEksternal.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelSertifikasiEksternal', 'route' => 'admin.tabel-sertifikasi-eksternals.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelSertifikasiEksternal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelSertifikasiEksternal">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.id') }}
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.lembaga_akreditasi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.jenis_akreditasi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.lingkup') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.tingkat') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.masa_berlaku') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiEksternal.fields.keterangan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelSertifikasiEksternals as $key => $tabelSertifikasiEksternal)
                        <tr data-entry-id="{{ $tabelSertifikasiEksternal->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelSertifikasiEksternal->id ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSertifikasiEksternal->tahun ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSertifikasiEksternal->lembaga_akreditasi ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSertifikasiEksternal->jenis_akreditasi ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TabelSertifikasiEksternal::LINGKUP_SELECT[$tabelSertifikasiEksternal->lingkup] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TabelSertifikasiEksternal::TINGKAT_SELECT[$tabelSertifikasiEksternal->tingkat] ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSertifikasiEksternal->masa_berlaku ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSertifikasiEksternal->keterangan ?? '' }}
                            </td>
                            <td>
                                @can('tabel_sertifikasi_eksternal_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-sertifikasi-eksternals.show', $tabelSertifikasiEksternal->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_sertifikasi_eksternal_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-sertifikasi-eksternals.edit', $tabelSertifikasiEksternal->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_sertifikasi_eksternal_delete')
                                    <form action="{{ route('admin.tabel-sertifikasi-eksternals.massDestroy', $tabelSertifikasiEksternal->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_sertifikasi_eksternal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-sertifikasi-eksternals.massDestroy') }}",
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
  let table = $('.datatable-TabelSertifikasiEksternal:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection