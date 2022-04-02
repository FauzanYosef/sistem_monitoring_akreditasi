@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.fileupload.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fileuploads.update", [$fileupload->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="namafile_id">{{ trans('cruds.fileupload.fields.namafile') }}</label>
                <select class="form-control select2 {{ $errors->has('namafile') ? 'is-invalid' : '' }}" name="namafile_id" id="namafile_id">
                    @foreach($namafiles as $id => $entry)
                        <option value="{{ $id }}" {{ (old('namafile_id') ? old('namafile_id') : $fileupload->namafile->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('namafile'))
                    <span class="text-danger">{{ $errors->first('namafile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fileupload.fields.namafile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="uploaddata">{{ trans('cruds.fileupload.fields.uploaddata') }}</label>
                <div class="needsclick dropzone {{ $errors->has('uploaddata') ? 'is-invalid' : '' }}" id="uploaddata-dropzone">
                </div>
                @if($errors->has('uploaddata'))
                    <span class="text-danger">{{ $errors->first('uploaddata') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fileupload.fields.uploaddata_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.fileupload.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan', $fileupload->keterangan) }}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fileupload.fields.keterangan_helper') }}</span>
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
    Dropzone.options.uploaddataDropzone = {
    url: '{{ route('admin.fileuploads.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="uploaddata"]').remove()
      $('form').append('<input type="hidden" name="uploaddata" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="uploaddata"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($fileupload) && $fileupload->uploaddata)
      var file = {!! json_encode($fileupload->uploaddata) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="uploaddata" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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