<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDaftarLaporanRequest;
use App\Http\Requests\StoreDaftarLaporanRequest;
use App\Http\Requests\UpdateDaftarLaporanRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DaftarLaporanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('daftar_laporan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.daftarLaporans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('daftar_laporan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.daftarLaporans.create');
    }

    public function store(StoreDaftarLaporanRequest $request)
    {
        $daftarLaporan = DaftarLaporan::create($request->all());

        return redirect()->route('admin.daftar-laporans.index');
    }

    public function edit(DaftarLaporan $daftarLaporan)
    {
        abort_if(Gate::denies('daftar_laporan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.daftarLaporans.edit', compact('daftarLaporan'));
    }

    public function update(UpdateDaftarLaporanRequest $request, DaftarLaporan $daftarLaporan)
    {
        $daftarLaporan->update($request->all());

        return redirect()->route('admin.daftar-laporans.index');
    }

    public function show(DaftarLaporan $daftarLaporan)
    {
        abort_if(Gate::denies('daftar_laporan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.daftarLaporans.show', compact('daftarLaporan'));
    }

    public function destroy(DaftarLaporan $daftarLaporan)
    {
        abort_if(Gate::denies('daftar_laporan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $daftarLaporan->delete();

        return back();
    }

    public function massDestroy(MassDestroyDaftarLaporanRequest $request)
    {
        DaftarLaporan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}