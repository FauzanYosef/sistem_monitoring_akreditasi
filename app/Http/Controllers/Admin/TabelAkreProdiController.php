<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelAkreProdiRequest;
use App\Http\Requests\StoreTabelAkreProdiRequest;
use App\Http\Requests\UpdateTabelAkreProdiRequest;
use App\Models\TabelAkreProdi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\DataPengajuan;
use Illuminate\Support\Facades\DB;

class TabelAkreProdiController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_akre_prodi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelAkreProdis = TabelAkreProdi::all();
        $tabelAkreProdis = DB::table('tabel_akre_prodis')
                          ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_akre_prodis.id_tahun')
                          ->select('daftar_pengajuan.tahun_pengajuan as tahun','tabel_akre_prodis.*')
                          ->get();

        return view('admin.tabelAkreProdis.index', compact('tabelAkreProdis'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_akre_prodi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelAkreProdis.create', compact('tahun_pengajuans'));
    }

    public function store(StoreTabelAkreProdiRequest $request)
    {
        $tabelAkreProdi = TabelAkreProdi::create($request->all());

        return redirect()->route('admin.tabel-akre-prodis.index');
    }

    public function edit(TabelAkreProdi $tabelAkreProdi)
    {
        abort_if(Gate::denies('tabel_akre_prodi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelAkreProdis.edit', compact('tabelAkreProdi'));
    }

    public function update(UpdateTabelAkreProdiRequest $request, TabelAkreProdi $tabelAkreProdi)
    {
        $tabelAkreProdi->update($request->all());

        return redirect()->route('admin.tabel-akre-prodis.index');
    }

    public function show(TabelAkreProdi $tabelAkreProdi)
    {
        abort_if(Gate::denies('tabel_akre_prodi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelAkreProdis.show', compact('tabelAkreProdi'));
    }

    public function destroy(TabelAkreProdi $tabelAkreProdi)
    {
        abort_if(Gate::denies('tabel_akre_prodi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelAkreProdi->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelAkreProdiRequest $request)
    {
        TabelAkreProdi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}