<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPemilihanAsesorRequest;
use App\Http\Requests\StorePemilihanAsesorRequest;
use App\Http\Requests\UpdatePemilihanAsesorRequest;
use App\Models\DataAsesor;
use App\Models\Kodeprodi;
use App\Models\PemilihanAsesor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PemilihanAsesorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pemilihan_asesor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilihanAsesors = PemilihanAsesor::with(['prodi', 'id_assesor'])->get();

        return view('admin.pemilihanAsesors.index', compact('pemilihanAsesors'));
    }

    public function create()
    {
        abort_if(Gate::denies('pemilihan_asesor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodis = Kodeprodi::pluck('nama_prodi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_assesors = DataAsesor::pluck('nama_asesor', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pemilihanAsesors.create', compact('prodis', 'id_assesors'));
    }

    public function store(StorePemilihanAsesorRequest $request)
    {
        $pemilihanAsesor = PemilihanAsesor::create($request->all());

        return redirect()->route('admin.pemilihan-asesors.index');
    }

    public function edit(PemilihanAsesor $pemilihanAsesor)
    {
        abort_if(Gate::denies('pemilihan_asesor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodis = Kodeprodi::pluck('nama_prodi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_assesors = DataAsesor::pluck('nama_asesor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pemilihanAsesor->load('prodi', 'id_assesor');

        return view('admin.pemilihanAsesors.edit', compact('prodis', 'id_assesors', 'pemilihanAsesor'));
    }

    public function update(UpdatePemilihanAsesorRequest $request, PemilihanAsesor $pemilihanAsesor)
    {
        $pemilihanAsesor->update($request->all());

        return redirect()->route('admin.pemilihan-asesors.index');
    }

    public function show(PemilihanAsesor $pemilihanAsesor)
    {
        abort_if(Gate::denies('pemilihan_asesor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilihanAsesor->load('prodi', 'id_assesor');

        return view('admin.pemilihanAsesors.show', compact('pemilihanAsesor'));
    }

    public function destroy(PemilihanAsesor $pemilihanAsesor)
    {
        abort_if(Gate::denies('pemilihan_asesor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilihanAsesor->delete();

        return back();
    }

    public function massDestroy(MassDestroyPemilihanAsesorRequest $request)
    {
        PemilihanAsesor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}