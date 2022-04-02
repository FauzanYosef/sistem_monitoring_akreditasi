<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTabelKerjasamaPtRequest;
use App\Http\Requests\StoreTabelKerjasamaPtRequest;
use App\Http\Requests\UpdateTabelKerjasamaPtRequest;
use App\Models\TabelKerjasamaPt;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Models\DataPengajuan;
use Illuminate\Support\Facades\DB;

class TabelKerjasamaPtController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_kerjasama_pt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelKerjasamaPts = TabelKerjasamaPt::with(['media'])->get();
        // $tahun_pengajuans = DB::table('tabel_kerjasama_pts')
        //                   ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_kerjasama_pts.id_tahun')
        //                   ->select('daftar_pengajuan.tahun_pengajuan as tahun','tabel_kerjasama_pts.bentuk as media','tabel_kerjasama_pts.*')
        //                   ->get();

        return view('admin.tabelKerjasamaPts.index', compact('tabelKerjasamaPts'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_kerjasama_pt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelKerjasamaPts.create', compact('tahun_pengajuans'));

    }

    public function store(StoreTabelKerjasamaPtRequest $request)
    {
        $tabelKerjasamaPt = TabelKerjasamaPt::create($request->all());

        foreach ($request->input('bukti', []) as $file) {
            $tabelKerjasamaPt->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('bukti');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tabelKerjasamaPt->id]);
        }

        return redirect()->route('admin.tabel-kerjasama-pts.index');
    }

    public function edit(TabelKerjasamaPt $tabelKerjasamaPt)
    {
        abort_if(Gate::denies('tabel_kerjasama_pt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelKerjasamaPts.edit', compact('tabelKerjasamaPt'));
    }

    public function update(UpdateTabelKerjasamaPtRequest $request, TabelKerjasamaPt $tabelKerjasamaPt)
    {
        $tabelKerjasamaPt->update($request->all());

        if (count($tabelKerjasamaPt->bukti) > 0) {
            foreach ($tabelKerjasamaPt->bukti as $media) {
                if (!in_array($media->file_name, $request->input('bukti', []))) {
                    $media->delete();
                }
            }
        }
        $media = $tabelKerjasamaPt->bukti->pluck('file_name')->toArray();
        foreach ($request->input('bukti', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $tabelKerjasamaPt->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('bukti');
            }
        }

        return redirect()->route('admin.tabel-kerjasama-pts.index');
    }

    public function show(TabelKerjasamaPt $tabelKerjasamaPt)
    {
        abort_if(Gate::denies('tabel_kerjasama_pt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelKerjasamaPts.show', compact('tabelKerjasamaPt'));
    }

    public function destroy(TabelKerjasamaPt $tabelKerjasamaPt)
    {
        abort_if(Gate::denies('tabel_kerjasama_pt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelKerjasamaPt->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelKerjasamaPtRequest $request)
    {
        TabelKerjasamaPt::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tabel_kerjasama_pt_create') && Gate::denies('tabel_kerjasama_pt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TabelKerjasamaPt();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}