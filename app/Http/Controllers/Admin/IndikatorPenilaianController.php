<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyIndikatorPenilaianRequest;
use App\Http\Requests\StoreIndikatorPenilaianRequest;
use App\Http\Requests\UpdateIndikatorPenilaianRequest;
use App\Models\IndikatorPenilaian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndikatorPenilaianController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('indikator_penilaian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indikatorPenilaians = IndikatorPenilaian::all();

        return view('admin.indikatorPenilaians.index', compact('indikatorPenilaians'));
    }

    public function create()
    {
        abort_if(Gate::denies('indikator_penilaian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indikatorPenilaians.create');
    }

    public function store(StoreIndikatorPenilaianRequest $request)
    {
        $indikatorPenilaian = IndikatorPenilaian::create($request->all());

        return redirect()->route('admin.indikator-penilaians.index');
    }

    public function edit(IndikatorPenilaian $indikatorPenilaian)
    {
        abort_if(Gate::denies('indikator_penilaian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indikatorPenilaians.edit', compact('indikatorPenilaian'));
    }

    public function update(UpdateIndikatorPenilaianRequest $request, IndikatorPenilaian $indikatorPenilaian)
    {
        $indikatorPenilaian->update($request->all());

        return redirect()->route('admin.indikator-penilaians.index');
    }

    public function show(IndikatorPenilaian $indikatorPenilaian)
    {
        abort_if(Gate::denies('indikator_penilaian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indikatorPenilaians.show', compact('indikatorPenilaian'));
    }

    public function destroy(IndikatorPenilaian $indikatorPenilaian)
    {
        abort_if(Gate::denies('indikator_penilaian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indikatorPenilaian->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndikatorPenilaianRequest $request)
    {
        IndikatorPenilaian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}