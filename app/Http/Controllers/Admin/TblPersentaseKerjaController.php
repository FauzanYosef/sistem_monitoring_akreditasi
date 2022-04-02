<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblPersentaseKerjaRequest;
use App\Http\Requests\StoreTblPersentaseKerjaRequest;
use App\Http\Requests\UpdateTblPersentaseKerjaRequest;
use App\Models\TblPersentaseKerja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblPersentaseKerjaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_persentase_kerja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPersentaseKerjas = TblPersentaseKerja::all();

        return view('admin.tblPersentaseKerjas.index', compact('tblPersentaseKerjas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_persentase_kerja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPersentaseKerjas.create');
    }

    public function store(StoreTblPersentaseKerjaRequest $request)
    {
        $tblPersentaseKerja = TblPersentaseKerja::create($request->all());

        return redirect()->route('admin.tbl-persentase-kerjas.index');
    }

    public function edit(TblPersentaseKerja $tblPersentaseKerja)
    {
        abort_if(Gate::denies('tbl_persentase_kerja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPersentaseKerjas.edit', compact('tblPersentaseKerja'));
    }

    public function update(UpdateTblPersentaseKerjaRequest $request, TblPersentaseKerja $tblPersentaseKerja)
    {
        $tblPersentaseKerja->update($request->all());

        return redirect()->route('admin.tbl-persentase-kerjas.index');
    }

    public function show(TblPersentaseKerja $tblPersentaseKerja)
    {
        abort_if(Gate::denies('tbl_persentase_kerja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPersentaseKerjas.show', compact('tblPersentaseKerja'));
    }

    public function destroy(TblPersentaseKerja $tblPersentaseKerja)
    {
        abort_if(Gate::denies('tbl_persentase_kerja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPersentaseKerja->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblPersentaseKerjaRequest $request)
    {
        TblPersentaseKerja::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}