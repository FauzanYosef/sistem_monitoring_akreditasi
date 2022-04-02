<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelKckpanDsnRequest;
use App\Http\Requests\StoreTabelKckpanDsnRequest;
use App\Http\Requests\UpdateTabelKckpanDsnRequest;
use App\Models\TabelKckpanDsn;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\DataPengajuan;
use Illuminate\Support\Facades\DB;

class TabelKckpanDsnController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_kckpan_dsn_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelKckpanDsns = TabelKckpanDsn::all();
        $tabelKckpanDsns = DB::table('tabel_kckpan_dsns')
                        ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_kckpan_dsns.id_tahun')
                        ->select('daftar_pengajuan.tahun_pengajuan as tahun','tabel_kckpan_dsns.*')
                        ->get();

        return view('admin.tabelKckpanDsns.index', compact('tabelKckpanDsns'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_kckpan_dsn_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelKckpanDsns.create', compact('tahun_pengajuans'));

        
    }

    public function store(StoreTabelKckpanDsnRequest $request)
    {
        $tabelKckpanDsn = TabelKckpanDsn::create($request->all());

        return redirect()->route('admin.tabel-kckpan-dsns.index');
    }

    public function edit(TabelKckpanDsn $tabelKckpanDsn)
    {
        abort_if(Gate::denies('tabel_kckpan_dsn_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelKckpanDsns.edit', compact('tabelKckpanDsn'));
    }

    public function update(UpdateTabelKckpanDsnRequest $request, TabelKckpanDsn $tabelKckpanDsn)
    {
        $tabelKckpanDsn->update($request->all());

        return redirect()->route('admin.tabel-kckpan-dsns.index');
    }

    public function show(TabelKckpanDsn $tabelKckpanDsn)
    {
        abort_if(Gate::denies('tabel_kckpan_dsn_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelKckpanDsns.show', compact('tabelKckpanDsn'));
    }

    public function destroy(TabelKckpanDsn $tabelKckpanDsn)
    {
        abort_if(Gate::denies('tabel_kckpan_dsn_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelKckpanDsn->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelKckpanDsnRequest $request)
    {
        TabelKckpanDsn::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}