@extends('layouts.admin')
@section('content')
@can('tabel_seleksimhsbaru_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tabel-seleksimhsbarus.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tabelSeleksimhsbaru.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TabelSeleksimhsbaru', 'route' => 'admin.tabel-seleksimhsbarus.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tabelSeleksimhsbaru.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TabelSeleksimhsbaru">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.id') }}
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.program_studi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.tahun_akademik') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.daya_tampung') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.jumlah_calon_pendaftar') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.jumlah_lulus_seleksi') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.jml_mhs_baru_reguler') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.jml_mhs_transfer') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.total_mhs_reguler') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabelSeleksimhsbaru.fields.total_mhs_transfer') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tabelSeleksimhsbarus as $key => $tabelSeleksimhsbaru)
                        <tr data-entry-id="{{ $tabelSeleksimhsbaru->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->id ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->tahun ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->program_studi ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->tahun_akademik ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->daya_tampung ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->jumlah_calon_pendaftar ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->jumlah_lulus_seleksi ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->jml_mhs_baru_reguler ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->jml_mhs_transfer ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->total_mhs_reguler ?? '' }}
                            </td>
                            <td>
                                {{ $tabelSeleksimhsbaru->total_mhs_transfer ?? '' }}
                            </td>
                            <td>
                                @can('tabel_seleksimhsbaru_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tabel-seleksimhsbarus.show', $tabelSeleksimhsbaru->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tabel_seleksimhsbaru_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tabel-seleksimhsbarus.edit', $tabelSeleksimhsbaru->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tabel_seleksimhsbaru_delete')
                                    <form action="{{ route('admin.tabel-seleksimhsbarus.destroy', $tabelSeleksimhsbaru->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tabel_seleksimhsbaru_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tabel-seleksimhsbarus.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-TabelSeleksimhsbaru:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection