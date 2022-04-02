<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeniliaianAssesorRequest;
use App\Http\Requests\StorePeniliaianAssesorRequest;
use App\Http\Requests\UpdatePeniliaianAssesorRequest;
use App\Models\PemilihanAsesor;
use App\Models\PenilaianIndikator;
use App\Models\PeniliaianAssesor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PeniliaianAssesorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('peniliaian_assesor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peniliaianAssesors = PeniliaianAssesor::with(['id_assesor', 'id_skor'])->get();

        return view('admin.peniliaianAssesors.index', compact('peniliaianAssesors'));
    }

    public function create()
    {
        abort_if(Gate::denies('peniliaian_assesor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_assesors = PemilihanAsesor::all()->pluck('id_pemilihan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_skors = PenilaianIndikator::all()->pluck('pilihan_penilaian', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.peniliaianAssesors.create', compact('id_assesors', 'id_skors'));
    }

    public function store(StorePeniliaianAssesorRequest $request)
    {
        $peniliaianAssesor = PeniliaianAssesor::create($request->all());

        return redirect()->route('admin.peniliaian-assesors.index');
    }

    public function edit(PeniliaianAssesor $peniliaianAssesor)
    {
        abort_if(Gate::denies('peniliaian_assesor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_assesors = PemilihanAsesor::all()->pluck('id_pemilihan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_skors = PenilaianIndikator::all()->pluck('pilihan_penilaian', 'id')->prepend(trans('global.pleaseSelect'), '');

        $peniliaianAssesor->load('id_assesor', 'id_skor');

        return view('admin.peniliaianAssesors.edit', compact('id_assesors', 'id_skors', 'peniliaianAssesor'));
    }

    public function update(UpdatePeniliaianAssesorRequest $request, PeniliaianAssesor $peniliaianAssesor)
    {
        $peniliaianAssesor->update($request->all());

        return redirect()->route('admin.peniliaian-assesors.index');
    }

    public function show(PeniliaianAssesor $peniliaianAssesor)
    {
        abort_if(Gate::denies('peniliaian_assesor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peniliaianAssesor->load('id_assesor', 'id_skor');

        return view('admin.peniliaianAssesors.show', compact('peniliaianAssesor'));
    }

    public function destroy(PeniliaianAssesor $peniliaianAssesor)
    {
        abort_if(Gate::denies('peniliaian_assesor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peniliaianAssesor->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeniliaianAssesorRequest $request)
    {
        PeniliaianAssesor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}