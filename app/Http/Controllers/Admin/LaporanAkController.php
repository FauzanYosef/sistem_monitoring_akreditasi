<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaporanAkRequest;
use App\Http\Requests\StoreLaporanAkRequest;
use App\Http\Requests\UpdateLaporanAkRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaporanAkController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laporan_ak_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanAks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('laporan_ak_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanAks.create');
    }

    public function store(StoreLaporanAkRequest $request)
    {
        $laporanAk = LaporanAk::create($request->all());

        return redirect()->route('admin.laporan-aks.index');
    }

    public function edit(LaporanAk $laporanAk)
    {
        abort_if(Gate::denies('laporan_ak_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanAks.edit', compact('laporanAk'));
    }

    public function update(UpdateLaporanAkRequest $request, LaporanAk $laporanAk)
    {
        $laporanAk->update($request->all());

        return redirect()->route('admin.laporan-aks.index');
    }

    public function show(LaporanAk $laporanAk)
    {
        abort_if(Gate::denies('laporan_ak_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laporanAks.show', compact('laporanAk'));
    }

    public function destroy(LaporanAk $laporanAk)
    {
        abort_if(Gate::denies('laporan_ak_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laporanAk->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaporanAkRequest $request)
    {
        LaporanAk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}