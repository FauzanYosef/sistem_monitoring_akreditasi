<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPenilaianIndikatorRequest;
use App\Http\Requests\StorePenilaianIndikatorRequest;
use App\Http\Requests\UpdatePenilaianIndikatorRequest;
use App\Models\IndikatorPenilaian;
use App\Models\PenilaianIndikator;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenilaianIndikatorController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('penilaian_indikator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penilaianIndikators = PenilaianIndikator::with(['indikator_skor'])->get();

        return view('admin.penilaianIndikators.index', compact('penilaianIndikators'));
    }

    public function create()
    {
        abort_if(Gate::denies('penilaian_indikator_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indikator_skors = IndikatorPenilaian::all()->pluck('elemen', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.penilaianIndikators.create', compact('indikator_skors'));
    }

    public function store(StorePenilaianIndikatorRequest $request)
    {
        $penilaianIndikator = PenilaianIndikator::create($request->all());

        return redirect()->route('admin.penilaian-indikators.index');
    }

    public function edit(PenilaianIndikator $penilaianIndikator)
    {
        abort_if(Gate::denies('penilaian_indikator_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indikator_skors = IndikatorPenilaian::all()->pluck('elemen', 'id')->prepend(trans('global.pleaseSelect'), '');

        $penilaianIndikator->load('indikator_skor');

        return view('admin.penilaianIndikators.edit', compact('indikator_skors', 'penilaianIndikator'));
    }

    public function update(UpdatePenilaianIndikatorRequest $request, PenilaianIndikator $penilaianIndikator)
    {
        $penilaianIndikator->update($request->all());

        return redirect()->route('admin.penilaian-indikators.index');
    }

    public function show(PenilaianIndikator $penilaianIndikator)
    {
        abort_if(Gate::denies('penilaian_indikator_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penilaianIndikator->load('indikator_skor');

        return view('admin.penilaianIndikators.show', compact('penilaianIndikator'));
    }

    public function destroy(PenilaianIndikator $penilaianIndikator)
    {
        abort_if(Gate::denies('penilaian_indikator_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penilaianIndikator->delete();

        return back();
    }

    public function massDestroy(MassDestroyPenilaianIndikatorRequest $request)
    {
        PenilaianIndikator::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}