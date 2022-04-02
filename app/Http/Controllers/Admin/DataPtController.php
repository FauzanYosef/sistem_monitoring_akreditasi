<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDataPtRequest;
use App\Http\Requests\StoreDataPtRequest;
use App\Http\Requests\UpdateDataPtRequest;
use App\Models\DataPt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataPtController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('data_pt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPts = DataPt::all();

        return view('admin.dataPts.index', compact('dataPts'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_pt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataPts.create');
    }

    public function store(StoreDataPtRequest $request)
    {
        $dataPt = DataPt::create($request->all());

        return redirect()->route('admin.data-pts.index');
    }

    public function edit(DataPt $dataPt)
    {
        abort_if(Gate::denies('data_pt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataPts.edit', compact('dataPt'));
    }

    public function update(UpdateDataPtRequest $request, DataPt $dataPt)
    {
        $dataPt->update($request->all());

        return redirect()->route('admin.data-pts.index');
    }

    public function show(DataPt $dataPt)
    {
        abort_if(Gate::denies('data_pt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataPts.show', compact('dataPt'));
    }

    public function destroy(DataPt $dataPt)
    {
        abort_if(Gate::denies('data_pt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPt->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataPtRequest $request)
    {
        DataPt::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}