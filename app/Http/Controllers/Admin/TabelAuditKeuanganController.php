<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTabelAuditKeuanganRequest;
use App\Http\Requests\StoreTabelAuditKeuanganRequest;
use App\Http\Requests\UpdateTabelAuditKeuanganRequest;
use App\Models\TabelAuditKeuangan;

use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\DataPengajuan;

class TabelAuditKeuanganController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tabel_audit_keuangan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelAuditKeuangans = TabelAuditKeuangan::all();
        $tabelAuditKeuangans = DB::table('tabel_audit_keuangans')
                                ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_audit_keuangans.id_tahun')
                                ->select('daftar_pengajuan.tahun_pengajuan as tahun_id','tabel_audit_keuangans.*')
                                ->get();

        return view('admin.tabelAuditKeuangans.index', compact('tabelAuditKeuangans'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_audit_keuangan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelAuditKeuangans.create', compact('tahun_pengajuans'));
        
    }

    public function store(StoreTabelAuditKeuanganRequest $request)
    {
        $tabelAuditKeuangan = TabelAuditKeuangan::create($request->all());

        return redirect()->route('admin.tabel-audit-keuangans.index');
    }

    public function edit(TabelAuditKeuangan $tabelAuditKeuangan)
    {
        abort_if(Gate::denies('tabel_audit_keuangan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelAuditKeuangans.edit', compact('tabelAuditKeuangan'));
    }

    public function update(UpdateTabelAuditKeuanganRequest $request, TabelAuditKeuangan $tabelAuditKeuangan)
    {
        $tabelAuditKeuangan->update($request->all());

        return redirect()->route('admin.tabel-audit-keuangans.index');
    }

    public function show(TabelAuditKeuangan $tabelAuditKeuangan)
    {
        abort_if(Gate::denies('tabel_audit_keuangan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelAuditKeuangans.show', compact('tabelAuditKeuangan'));
    }

    public function destroy(TabelAuditKeuangan $tabelAuditKeuangan)
    {
        abort_if(Gate::denies('tabel_audit_keuangan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelAuditKeuangan->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelAuditKeuanganRequest $request)
    {
        TabelAuditKeuangan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}