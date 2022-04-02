<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblPenggunaanDanaRequest;
use App\Http\Requests\StoreTblPenggunaanDanaRequest;
use App\Http\Requests\UpdateTblPenggunaanDanaRequest;
use App\Models\TblPenggunaanDana;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblPenggunaanDanaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_penggunaan_dana_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPenggunaanDanas = TblPenggunaanDana::all();

        return view('admin.tblPenggunaanDanas.index', compact('tblPenggunaanDanas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_penggunaan_dana_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPenggunaanDanas.create');
    }

    public function store(StoreTblPenggunaanDanaRequest $request)
    {
        $tblPenggunaanDana = TblPenggunaanDana::create($request->all());

        return redirect()->route('admin.tbl-penggunaan-danas.index');
    }

    public function edit(TblPenggunaanDana $tblPenggunaanDana)
    {
        abort_if(Gate::denies('tbl_penggunaan_dana_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPenggunaanDanas.edit', compact('tblPenggunaanDana'));
    }

    public function update(UpdateTblPenggunaanDanaRequest $request, TblPenggunaanDana $tblPenggunaanDana)
    {
        $tblPenggunaanDana->update($request->all());

        return redirect()->route('admin.tbl-penggunaan-danas.index');
    }

    public function show(TblPenggunaanDana $tblPenggunaanDana)
    {
        abort_if(Gate::denies('tbl_penggunaan_dana_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPenggunaanDanas.show', compact('tblPenggunaanDana'));
    }

    public function destroy(TblPenggunaanDana $tblPenggunaanDana)
    {
        abort_if(Gate::denies('tbl_penggunaan_dana_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPenggunaanDana->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblPenggunaanDanaRequest $request)
    {
        TblPenggunaanDana::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}