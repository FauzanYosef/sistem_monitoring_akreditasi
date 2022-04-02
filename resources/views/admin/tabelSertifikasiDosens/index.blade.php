@extends('layouts.admin')
@section('content')
@can('tabel_sertifikasi_dosen_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-sertifikasi-dosens.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelSertifikasiDosen.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelSertifikasiDosen', 'route' => 'admin.tabel-sertifikasi-dosens.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelSertifikasiDosen.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelSertifikasiDosen">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiDosen.fields.id') }}
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiDosen.fields.unit_pengelola') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiDosen.fields.jml_dosen') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSertifikasiDosen.fields.jml_dosen_sertifikat') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelSertifikasiDosens as $key => $tabelSertifikasiDosen)
                        <tr data-entry-id="{{ $tabelSertifikasiDosen->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelSertifikasiDosen->id ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSertifikasiDosen->tahun ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TabelSertifikasiDosen::UNIT_PENGELOLA_SELECT[$tabelSertifikasiDosen->unit_pengelola] ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSertifikasiDosen->jml_dosen ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSertifikasiDosen->jml_dosen_sertifikat ?? '' }}
                            </td>
                            <td>
                                @can('tabel_sertifikasi_dosen_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-sertifikasi-dosens.show', $tabelSertifikasiDosen->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_sertifikasi_dosen_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-sertifikasi-dosens.edit', $tabelSertifikasiDosen->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_sertifikasi_dosen_delete')
                                    <form action="{{ route('admin.tabel-sertifikasi-dosens.destroy', $tabelSertifikasiDosen->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_sertifikasi_dosen_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-sertifikasi-dosens.massDestroy') }}",
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
  let table = $('.datatable-TabelSertifikasiDosen:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection