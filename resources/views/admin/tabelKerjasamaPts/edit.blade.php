@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tabelKerjasamaPt.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tabel-kerjasama-pts.update", [$tabelKerjasamaPt->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="lembaga">{{ trans('cruds.tabelKerjasamaPt.fields.lembaga') }}</label>
                <input class="form-control {{ $errors->has('lembaga') ? 'is-invalid' : '' }}" type="text" name="lembaga" id="lembaga" value="{{ old('lembaga', $tabelKerjasamaPt->lembaga) }}">
                @if($errors->has('lembaga'))
                    <span class="text-danger">{{ $errors->first('lembaga') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKerjasamaPt.fields.lembaga_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.tabelKerjasamaPt.fields.tingkat') }}</label>
                <select class="form-control {{ $errors->has('tingkat') ? 'is-invalid' : '' }}" name="tingkat" id="tingkat">
                    <option value disabled {{ old('tingkat', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TabelKerjasamaPt::TINGKAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tingkat', $tabelKerjasamaPt->tingkat) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tingkat'))
                    <span class="text-danger">{{ $errors->first('tingkat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKerjasamaPt.fields.tingkat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bentuk">{{ trans('cruds.tabelKerjasamaPt.fields.bentuk') }}</label>
                <textarea class="form-control {{ $errors->has('bentuk') ? 'is-invalid' : '' }}" name="bentuk" id="bentuk">{{ old('bentuk', $tabelKerjasamaPt->bentuk) }}</textarea>
                @if($errors->has('bentuk'))
                    <span class="text-danger">{{ $errors->first('bentuk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKerjasamaPt.fields.bentuk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti">{{ trans('cruds.tabelKerjasamaPt.fields.bukti') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti') ? 'is-invalid' : '' }}" id="bukti-dropzone">
                </div>
                @if($errors->has('bukti'))
                    <span class="text-danger">{{ $errors->first('bukti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKerjasamaPt.fields.bukti_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="berlaku">{{ trans('cruds.tabelKerjasamaPt.fields.berlaku') }}</label>
                <input class="form-control {{ $errors->has('berlaku') ? 'is-invalid' : '' }}" type="text" name="berlaku" id="berlaku" value="{{ old('berlaku', $tabelKerjasamaPt->berlaku) }}">
                @if($errors->has('berlaku'))
                    <span class="text-danger">{{ $errors->first('berlaku') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tabelKerjasamaPt.fields.berlaku_helper') }}</span>
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
<script>
    var uploadedBuktiMap = {}
Dropzone.options.buktiDropzone = {
    url: '{{ route('admin.tabel-kerjasama-pts.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="bukti[]" value="' + response.name + '">')
      uploadedBuktiMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBuktiMap[file.name]
      }
      $('form').find('input[name="bukti[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($tabelKerjasamaPt) && $tabelKerjasamaPt->bukti)
          var files =
            {!! json_encode($tabelKerjasamaPt->bukti) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="bukti[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection