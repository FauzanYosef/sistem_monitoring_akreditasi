@extends('layouts.admin')
@section('content')
@can('data_pengajuan_create')
    <!-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.data-pengajuans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dataPengajuan.title_singular') }}
            </a>
        </div>
    </div> -->
@endcan
<div class="card">
    <div class="card-header">
        Tahun Monitoring
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.data-pengajuans.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- <div class="form-group">
                <label class="required" for="tahun_pengajuan">{{ trans('cruds.dataPengajuan.fields.tahun_pengajuan') }}</label>
                <input class="form-control {{ $errors->has('tahun_pengajuan') ? 'is-invalid' : '' }}" type="text" name="tahun_pengajuan" id="tahun_pengajuan" value="{{ old('tahun_pengajuan', '') }}" required>
                @if($errors->has('tahun_pengajuan'))
                    <span class="text-danger">{{ $errors->first('tahun_pengajuan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPengajuan.fields.tahun_pengajuan_helper') }}</span>
            </div> -->
            <div class="form-group">
                <label class="required">{{ trans('cruds.dataPengajuan.fields.tahun') }}</label>
                <select class="form-control {{ $errors->has('tahun_pengajuan') ? 'is-invalid' : '' }}" name="tahun_pengajuan" id="tahun_pengajuan"required>
                    <option value disabled {{ old('tahun_pengajuan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DataPengajuan::tahun_pengajuan_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tahun_pengajuan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tahun_pengajuan'))
                    <span class="text-danger">{{ $errors->first('tahun_pengajuan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dataPengajuan.fields.tahun_helper') }}</span>
            </div>

            <div class="form-group">
               
                
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('data_pengajuan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-pengajuans.massDestroy') }}",
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
  let table = $('.datatable-DataPengajuan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})


</script>
@endsection
<script>
   var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>