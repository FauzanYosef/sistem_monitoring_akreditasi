<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblIpkRequest;
use App\Http\Requests\StoreTblIpkRequest;
use App\Http\Requests\UpdateTblIpkRequest;
use App\Models\TblIpk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblIpkController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_ipk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblIpks = TblIpk::all();

        return view('admin.tblIpks.index', compact('tblIpks'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_ipk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblIpks.create');
    }

    public function store(StoreTblIpkRequest $request)
    {
        $tblIpk = TblIpk::create($request->all());

        return redirect()->route('admin.tbl-ipks.index');
    }

    public function edit(TblIpk $tblIpk)
    {
        abort_if(Gate::denies('tbl_ipk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblIpks.edit', compact('tblIpk'));
    }

    public function update(UpdateTblIpkRequest $request, TblIpk $tblIpk)
    {
        $tblIpk->update($request->all());

        return redirect()->route('admin.tbl-ipks.index');
    }

    public function show(TblIpk $tblIpk)
    {
        abort_if(Gate::denies('tbl_ipk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblIpks.show', compact('tblIpk'));
    }

    public function destroy(TblIpk $tblIpk)
    {
        abort_if(Gate::denies('tbl_ipk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblIpk->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblIpkRequest $request)
    {
        TblIpk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}