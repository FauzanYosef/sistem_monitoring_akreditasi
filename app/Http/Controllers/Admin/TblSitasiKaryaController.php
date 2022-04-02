<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblSitasiKaryaRequest;
use App\Http\Requests\StoreTblSitasiKaryaRequest;
use App\Http\Requests\UpdateTblSitasiKaryaRequest;
use App\Models\TblSitasiKarya;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblSitasiKaryaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_sitasi_karya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblSitasiKaryas = TblSitasiKarya::all();

        return view('admin.tblSitasiKaryas.index', compact('tblSitasiKaryas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_sitasi_karya_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblSitasiKaryas.create');
    }

    public function store(StoreTblSitasiKaryaRequest $request)
    {
        $tblSitasiKarya = TblSitasiKarya::create($request->all());

        return redirect()->route('admin.tbl-sitasi-karyas.index');
    }

    public function edit(TblSitasiKarya $tblSitasiKarya)
    {
        abort_if(Gate::denies('tbl_sitasi_karya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblSitasiKaryas.edit', compact('tblSitasiKarya'));
    }

    public function update(UpdateTblSitasiKaryaRequest $request, TblSitasiKarya $tblSitasiKarya)
    {
        $tblSitasiKarya->update($request->all());

        return redirect()->route('admin.tbl-sitasi-karyas.index');
    }

    public function show(TblSitasiKarya $tblSitasiKarya)
    {
        abort_if(Gate::denies('tbl_sitasi_karya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblSitasiKaryas.show', compact('tblSitasiKarya'));
    }

    public function destroy(TblSitasiKarya $tblSitasiKarya)
    {
        abort_if(Gate::denies('tbl_sitasi_karya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblSitasiKarya->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblSitasiKaryaRequest $request)
    {
        TblSitasiKarya::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}