<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelMhsAsingRequest;
use App\Http\Requests\StoreTabelMhsAsingRequest;
use App\Http\Requests\UpdateTabelMhsAsingRequest;
use App\Models\Kodeprodi;
use App\Models\TabelMhsAsing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\DataPengajuan;

class TabelMhsAsingController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_mhs_asing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelMhsAsings = TabelMhsAsing::with(['prodi'])->get();
        $tabelMhsAsings = DB::table('tabel_mhs_asings')
                                ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_mhs_asings.id_tahun')
                                ->leftJoin('kodeprodis','kodeprodis.id','=','tabel_mhs_asings.prodi_id')
                                ->select('daftar_pengajuan.tahun_pengajuan as tahun','kodeprodis.nama_prodi as nama_prodi','tabel_mhs_asings.*')
                                ->get();

        return view('admin.tabelMhsAsings.index', compact('tabelMhsAsings'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_mhs_asing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodis = Kodeprodi::pluck('nama_prodi', 'id')->prepend(trans('global.pleaseSelect'), '');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelMhsAsings.create', compact('tahun_pengajuans','prodis'));

        //return view('admin.tabelMhsAsings.create', compact('prodis'));
    }

    public function store(StoreTabelMhsAsingRequest $request)
    {
        $tabelMhsAsing = TabelMhsAsing::create($request->all());

        return redirect()->route('admin.tabel-mhs-asings.index');
    }

    public function edit(TabelMhsAsing $tabelMhsAsing)
    {
        abort_if(Gate::denies('tabel_mhs_asing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodis = Kodeprodi::pluck('nama_prodi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tabelMhsAsing->load('prodi');

        return view('admin.tabelMhsAsings.edit', compact('prodis', 'tabelMhsAsing'));
    }

    public function update(UpdateTabelMhsAsingRequest $request, TabelMhsAsing $tabelMhsAsing)
    {
        $tabelMhsAsing->update($request->all());

        return redirect()->route('admin.tabel-mhs-asings.index');
    }

    public function show(TabelMhsAsing $tabelMhsAsing)
    {
        abort_if(Gate::denies('tabel_mhs_asing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelMhsAsing->load('prodi');

        return view('admin.tabelMhsAsings.show', compact('tabelMhsAsing'));
    }

    public function destroy(TabelMhsAsing $tabelMhsAsing)
    {
        abort_if(Gate::denies('tabel_mhs_asing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelMhsAsing->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelMhsAsingRequest $request)
    {
        TabelMhsAsing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}