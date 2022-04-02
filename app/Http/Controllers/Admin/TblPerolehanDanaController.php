<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblPerolehanDanaRequest;
use App\Http\Requests\StoreTblPerolehanDanaRequest;
use App\Http\Requests\UpdateTblPerolehanDanaRequest;
use App\Models\TblPerolehanDana;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblPerolehanDanaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_perolehan_dana_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPerolehanDanas = TblPerolehanDana::all();

        return view('admin.tblPerolehanDanas.index', compact('tblPerolehanDanas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_perolehan_dana_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPerolehanDanas.create');
    }

    public function store(StoreTblPerolehanDanaRequest $request)
    {
        $tblPerolehanDana = TblPerolehanDana::create($request->all());

        return redirect()->route('admin.tbl-perolehan-danas.index');
    }

    public function edit(TblPerolehanDana $tblPerolehanDana)
    {
        abort_if(Gate::denies('tbl_perolehan_dana_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPerolehanDanas.edit', compact('tblPerolehanDana'));
    }

    public function update(UpdateTblPerolehanDanaRequest $request, TblPerolehanDana $tblPerolehanDana)
    {
        $tblPerolehanDana->update($request->all());

        return redirect()->route('admin.tbl-perolehan-danas.index');
    }

    public function show(TblPerolehanDana $tblPerolehanDana)
    {
        abort_if(Gate::denies('tbl_perolehan_dana_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPerolehanDanas.show', compact('tblPerolehanDana'));
    }

    public function destroy(TblPerolehanDana $tblPerolehanDana)
    {
        abort_if(Gate::denies('tbl_perolehan_dana_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPerolehanDana->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblPerolehanDanaRequest $request)
    {
        TblPerolehanDana::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}