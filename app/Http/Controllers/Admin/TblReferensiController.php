<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblReferensiRequest;
use App\Http\Requests\StoreTblReferensiRequest;
use App\Http\Requests\UpdateTblReferensiRequest;
use App\Models\TblReferensi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblReferensiController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_referensi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblReferensis = TblReferensi::all();

        return view('admin.tblReferensis.index', compact('tblReferensis'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_referensi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblReferensis.create');
    }

    public function store(StoreTblReferensiRequest $request)
    {
        $tblReferensi = TblReferensi::create($request->all());

        return redirect()->route('admin.tbl-referensis.index');
    }

    public function edit(TblReferensi $tblReferensi)
    {
        abort_if(Gate::denies('tbl_referensi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblReferensis.edit', compact('tblReferensi'));
    }

    public function update(UpdateTblReferensiRequest $request, TblReferensi $tblReferensi)
    {
        $tblReferensi->update($request->all());

        return redirect()->route('admin.tbl-referensis.index');
    }

    public function show(TblReferensi $tblReferensi)
    {
        abort_if(Gate::denies('tbl_referensi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblReferensis.show', compact('tblReferensi'));
    }

    public function destroy(TblReferensi $tblReferensi)
    {
        abort_if(Gate::denies('tbl_referensi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblReferensi->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblReferensiRequest $request)
    {
        TblReferensi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}