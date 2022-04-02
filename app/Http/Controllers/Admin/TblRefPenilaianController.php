<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblRefPenilaianRequest;
use App\Http\Requests\StoreTblRefPenilaianRequest;
use App\Http\Requests\UpdateTblRefPenilaianRequest;
use App\Models\TblRefPenilaian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblRefPenilaianController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_ref_penilaian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblRefPenilaians = TblRefPenilaian::all();

        return view('admin.tblRefPenilaians.index', compact('tblRefPenilaians'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_ref_penilaian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblRefPenilaians.create');
    }

    public function store(StoreTblRefPenilaianRequest $request)
    {
        $tblRefPenilaian = TblRefPenilaian::create($request->all());

        return redirect()->route('admin.tbl-ref-penilaians.index');
    }

    public function edit(TblRefPenilaian $tblRefPenilaian)
    {
        abort_if(Gate::denies('tbl_ref_penilaian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblRefPenilaians.edit', compact('tblRefPenilaian'));
    }

    public function update(UpdateTblRefPenilaianRequest $request, TblRefPenilaian $tblRefPenilaian)
    {
        $tblRefPenilaian->update($request->all());

        return redirect()->route('admin.tbl-ref-penilaians.index');
    }

    public function show(TblRefPenilaian $tblRefPenilaian)
    {
        abort_if(Gate::denies('tbl_ref_penilaian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblRefPenilaians.show', compact('tblRefPenilaian'));
    }

    public function destroy(TblRefPenilaian $tblRefPenilaian)
    {
        abort_if(Gate::denies('tbl_ref_penilaian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblRefPenilaian->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblRefPenilaianRequest $request)
    {
        TblRefPenilaian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}