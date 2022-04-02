<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblLamaStudiRequest;
use App\Http\Requests\StoreTblLamaStudiRequest;
use App\Http\Requests\UpdateTblLamaStudiRequest;
use App\Models\TblLamaStudi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblLamaStudiController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_lama_studi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblLamaStudis = TblLamaStudi::all();

        return view('admin.tblLamaStudis.index', compact('tblLamaStudis'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_lama_studi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblLamaStudis.create');
    }

    public function store(StoreTblLamaStudiRequest $request)
    {
        $tblLamaStudi = TblLamaStudi::create($request->all());

        return redirect()->route('admin.tbl-lama-studis.index');
    }

    public function edit(TblLamaStudi $tblLamaStudi)
    {
        abort_if(Gate::denies('tbl_lama_studi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblLamaStudis.edit', compact('tblLamaStudi'));
    }

    public function update(UpdateTblLamaStudiRequest $request, TblLamaStudi $tblLamaStudi)
    {
        $tblLamaStudi->update($request->all());

        return redirect()->route('admin.tbl-lama-studis.index');
    }

    public function show(TblLamaStudi $tblLamaStudi)
    {
        abort_if(Gate::denies('tbl_lama_studi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblLamaStudis.show', compact('tblLamaStudi'));
    }

    public function destroy(TblLamaStudi $tblLamaStudi)
    {
        abort_if(Gate::denies('tbl_lama_studi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblLamaStudi->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblLamaStudiRequest $request)
    {
        TblLamaStudi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}