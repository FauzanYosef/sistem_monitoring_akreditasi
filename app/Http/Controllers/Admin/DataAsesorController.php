<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDataAsesorRequest;
use App\Http\Requests\StoreDataAsesorRequest;
use App\Http\Requests\UpdateDataAsesorRequest;
use App\Models\DataAsesor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataAsesorController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('data_asesor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataAsesors = DataAsesor::all();

        return view('admin.dataAsesors.index', compact('dataAsesors'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_asesor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataAsesors.create');
    }

    public function store(StoreDataAsesorRequest $request)
    {
        $dataAsesor = DataAsesor::create($request->all());

        return redirect()->route('admin.data-asesors.index');
    }

    public function edit(DataAsesor $dataAsesor)
    {
        abort_if(Gate::denies('data_asesor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataAsesors.edit', compact('dataAsesor'));
    }

    public function update(UpdateDataAsesorRequest $request, DataAsesor $dataAsesor)
    {
        $dataAsesor->update($request->all());

        return redirect()->route('admin.data-asesors.index');
    }

    public function show(DataAsesor $dataAsesor)
    {
        abort_if(Gate::denies('data_asesor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataAsesors.show', compact('dataAsesor'));
    }

    public function destroy(DataAsesor $dataAsesor)
    {
        abort_if(Gate::denies('data_asesor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataAsesor->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataAsesorRequest $request)
    {
        DataAsesor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}