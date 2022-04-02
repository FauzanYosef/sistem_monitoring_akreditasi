<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelAkreditasiProdiRequest;
use App\Http\Requests\StoreTabelAkreditasiProdiRequest;
use App\Http\Requests\UpdateTabelAkreditasiProdiRequest;
use App\Models\Kodeprodi;
use App\Models\DataPengajuan;
use App\Models\TabelAkreditasiProdi;
use App\Models\User;
use App\Models\DataProdi;
use App\Models\DataPt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class TabelAkreditasiProdiController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_akreditasi_prodi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelAkreditasiProdis = TabelAkreditasiProdi::with(['prodi'])->get();
        $tabelAkreditasiProdis = DB::table('tabel_akreditasi_prodis')
                          ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_akreditasi_prodis.id_tahun')
                          ->leftJoin('kodeprodis','kodeprodis.id','=','tabel_akreditasi_prodis.prodi_id')
                          ->select('daftar_pengajuan.tahun_pengajuan as tahun','kodeprodis.nama_prodi as nama_prodi','tabel_akreditasi_prodis.*')
                          ->get();

        return view('admin.tabelAkreditasiProdis.index', compact('tabelAkreditasiProdis'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_akreditasi_prodi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodis = Kodeprodi::pluck('nama_prodi', 'id')->prepend(trans('global.pleaseSelect'), '');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.tabelAkreditasiProdis.create', compact('tahun_pengajuans','prodis'));
    }

    public function store(StoreTabelAkreditasiProdiRequest $request)
    {
        $tabelAkreditasiProdi = TabelAkreditasiProdi::create($request->all());

        return redirect()->route('admin.tabel-akreditasi-prodis.index');
    }

    public function edit(TabelAkreditasiProdi $tabelAkreditasiProdi)
    {
        abort_if(Gate::denies('tabel_akreditasi_prodi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodis = Kodeprodi::pluck('nama_prodi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tabelAkreditasiProdi->load('prodi');

        return view('admin.tabelAkreditasiProdis.edit', compact('prodis', 'tabelAkreditasiProdi'));
    }

    public function update(UpdateTabelAkreditasiProdiRequest $request, TabelAkreditasiProdi $tabelAkreditasiProdi)
    {
        $tabelAkreditasiProdi->update($request->all());

        return redirect()->route('admin.tabel-akreditasi-prodis.index');
    }

    public function show(TabelAkreditasiProdi $tabelAkreditasiProdi)
    {
        abort_if(Gate::denies('tabel_akreditasi_prodi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelAkreditasiProdi->load('prodi');

        return view('admin.tabelAkreditasiProdis.show', compact('tabelAkreditasiProdi'));
    }

    public function destroy(TabelAkreditasiProdi $tabelAkreditasiProdi)
    {
        abort_if(Gate::denies('tabel_akreditasi_prodi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelAkreditasiProdi->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelAkreditasiProdiRequest $request)
    {
        TabelAkreditasiProdi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}