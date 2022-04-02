<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFileuploadRequest;
use App\Http\Requests\StoreFileuploadRequest;
use App\Http\Requests\UpdateFileuploadRequest;
use App\Models\Borang;
use App\Models\Fileupload;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FileuploadController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fileupload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fileuploads = Fileupload::with(['namafile', 'media'])->get();

        return view('admin.fileuploads.index', compact('fileuploads'));
    }

    public function create()
    {
        abort_if(Gate::denies('fileupload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $namafiles = Borang::pluck('nama_file', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fileuploads.create', compact('namafiles'));
    }

    public function store(StoreFileuploadRequest $request)
    {
        $fileupload = Fileupload::create($request->all());

        if ($request->input('uploaddata', false)) {
            $fileupload->addMedia(storage_path('tmp/uploads/' . basename($request->input('uploaddata'))))->toMediaCollection('uploaddata');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $fileupload->id]);
        }

        return redirect()->route('admin.fileuploads.index');
    }

    public function edit(Fileupload $fileupload)
    {
        abort_if(Gate::denies('fileupload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $namafiles = Borang::pluck('nama_file', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fileupload->load('namafile');

        return view('admin.fileuploads.edit', compact('namafiles', 'fileupload'));
    }

    public function update(UpdateFileuploadRequest $request, Fileupload $fileupload)
    {
        $fileupload->update($request->all());

        if ($request->input('uploaddata', false)) {
            if (!$fileupload->uploaddata || $request->input('uploaddata') !== $fileupload->uploaddata->file_name) {
                if ($fileupload->uploaddata) {
                    $fileupload->uploaddata->delete();
                }
                $fileupload->addMedia(storage_path('tmp/uploads/' . basename($request->input('uploaddata'))))->toMediaCollection('uploaddata');
            }
        } elseif ($fileupload->uploaddata) {
            $fileupload->uploaddata->delete();
        }

        return redirect()->route('admin.fileuploads.index');
    }

    public function show(Fileupload $fileupload)
    {
        abort_if(Gate::denies('fileupload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fileupload->load('namafile');

        return view('admin.fileuploads.show', compact('fileupload'));
    }

    public function destroy(Fileupload $fileupload)
    {
        abort_if(Gate::denies('fileupload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fileupload->delete();

        return back();
    }

    public function massDestroy(MassDestroyFileuploadRequest $request)
    {
        Fileupload::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('fileupload_create') && Gate::denies('fileupload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Fileupload();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}