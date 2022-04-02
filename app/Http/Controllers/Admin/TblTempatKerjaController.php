<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblTempatKerjaRequest;
use App\Http\Requests\StoreTblTempatKerjaRequest;
use App\Http\Requests\UpdateTblTempatKerjaRequest;
use App\Models\TblTempatKerja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblTempatKerjaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_tempat_kerja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblTempatKerjas = TblTempatKerja::all();

        return view('admin.tblTempatKerjas.index', compact('tblTempatKerjas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_tempat_kerja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblTempatKerjas.create');
    }

    public function store(StoreTblTempatKerjaRequest $request)
    {
        $tblTempatKerja = TblTempatKerja::create($request->all());

        return redirect()->route('admin.tbl-tempat-kerjas.index');
    }

    public function edit(TblTempatKerja $tblTempatKerja)
    {
        abort_if(Gate::denies('tbl_tempat_kerja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblTempatKerjas.edit', compact('tblTempatKerja'));
    }

    public function update(UpdateTblTempatKerjaRequest $request, TblTempatKerja $tblTempatKerja)
    {
        $tblTempatKerja->update($request->all());

        return redirect()->route('admin.tbl-tempat-kerjas.index');
    }

    public function show(TblTempatKerja $tblTempatKerja)
    {
        abort_if(Gate::denies('tbl_tempat_kerja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblTempatKerjas.show', compact('tblTempatKerja'));
    }

    public function destroy(TblTempatKerja $tblTempatKerja)
    {
        abort_if(Gate::denies('tbl_tempat_kerja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblTempatKerja->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblTempatKerjaRequest $request)
    {
        TblTempatKerja::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}