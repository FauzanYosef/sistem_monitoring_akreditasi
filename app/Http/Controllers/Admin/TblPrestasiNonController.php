<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblPrestasiNonRequest;
use App\Http\Requests\StoreTblPrestasiNonRequest;
use App\Http\Requests\UpdateTblPrestasiNonRequest;
use App\Models\TblPrestasiNon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblPrestasiNonController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_prestasi_non_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPrestasiNons = TblPrestasiNon::all();

        return view('admin.tblPrestasiNons.index', compact('tblPrestasiNons'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_prestasi_non_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPrestasiNons.create');
    }

    public function store(StoreTblPrestasiNonRequest $request)
    {
        $tblPrestasiNon = TblPrestasiNon::create($request->all());

        return redirect()->route('admin.tbl-prestasi-nons.index');
    }

    public function edit(TblPrestasiNon $tblPrestasiNon)
    {
        abort_if(Gate::denies('tbl_prestasi_non_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPrestasiNons.edit', compact('tblPrestasiNon'));
    }

    public function update(UpdateTblPrestasiNonRequest $request, TblPrestasiNon $tblPrestasiNon)
    {
        $tblPrestasiNon->update($request->all());

        return redirect()->route('admin.tbl-prestasi-nons.index');
    }

    public function show(TblPrestasiNon $tblPrestasiNon)
    {
        abort_if(Gate::denies('tbl_prestasi_non_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPrestasiNons.show', compact('tblPrestasiNon'));
    }

    public function destroy(TblPrestasiNon $tblPrestasiNon)
    {
        abort_if(Gate::denies('tbl_prestasi_non_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPrestasiNon->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblPrestasiNonRequest $request)
    {
        TblPrestasiNon::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}