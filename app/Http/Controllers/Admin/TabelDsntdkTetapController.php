<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelDsntdkTetapRequest;
use App\Http\Requests\StoreTabelDsntdkTetapRequest;
use App\Http\Requests\UpdateTabelDsntdkTetapRequest;
use App\Models\TabelDsntdkTetap;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\DataPengajuan;

class TabelDsntdkTetapController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_dsntdk_tetap_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelDsntdkTetaps = TabelDsntdkTetap::all();
        $tabelDsntdkTetaps = DB::table('tabel_dsntdk_tetaps')
                                ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_dsntdk_tetaps.id_tahun')
                                ->select('daftar_pengajuan.tahun_pengajuan as tahun','tabel_dsntdk_tetaps.*')
                                ->get();


        return view('admin.tabelDsntdkTetaps.index', compact('tabelDsntdkTetaps'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_dsntdk_tetap_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelDsntdkTetaps.create', compact('tahun_pengajuans'));

        //return view('admin.tabelDsntdkTetaps.create');
    }

    public function store(StoreTabelDsntdkTetapRequest $request)
    {
        $tabelDsntdkTetap = TabelDsntdkTetap::create($request->all());

        return redirect()->route('admin.tabel-dsntdk-tetaps.index');
    }

    public function edit(TabelDsntdkTetap $tabelDsntdkTetap)
    {
        abort_if(Gate::denies('tabel_dsntdk_tetap_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelDsntdkTetaps.edit', compact('tabelDsntdkTetap'));
    }

    public function update(UpdateTabelDsntdkTetapRequest $request, TabelDsntdkTetap $tabelDsntdkTetap)
    {
        $tabelDsntdkTetap->update($request->all());

        return redirect()->route('admin.tabel-dsntdk-tetaps.index');
    }

    public function show(TabelDsntdkTetap $tabelDsntdkTetap)
    {
        abort_if(Gate::denies('tabel_dsntdk_tetap_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelDsntdkTetaps.show', compact('tabelDsntdkTetap'));
    }

    public function destroy(TabelDsntdkTetap $tabelDsntdkTetap)
    {
        abort_if(Gate::denies('tabel_dsntdk_tetap_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelDsntdkTetap->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelDsntdkTetapRequest $request)
    {
        TabelDsntdkTetap::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}