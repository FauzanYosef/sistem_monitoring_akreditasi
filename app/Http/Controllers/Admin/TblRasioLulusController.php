<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblRasioLuluRequest;
use App\Http\Requests\StoreTblRasioLuluRequest;
use App\Http\Requests\UpdateTblRasioLuluRequest;
use App\Models\TblRasioLulu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblRasioLulusController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_rasio_lulu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblRasioLulus = TblRasioLulu::all();

        return view('admin.tblRasioLulus.index', compact('tblRasioLulus'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_rasio_lulu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblRasioLulus.create');
    }

    public function store(StoreTblRasioLuluRequest $request)
    {
        $tblRasioLulu = TblRasioLulu::create($request->all());

        return redirect()->route('admin.tbl-rasio-lulus.index');
    }

    public function edit(TblRasioLulu $tblRasioLulu)
    {
        abort_if(Gate::denies('tbl_rasio_lulu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblRasioLulus.edit', compact('tblRasioLulu'));
    }

    public function update(UpdateTblRasioLuluRequest $request, TblRasioLulu $tblRasioLulu)
    {
        $tblRasioLulu->update($request->all());

        return redirect()->route('admin.tbl-rasio-lulus.index');
    }

    public function show(TblRasioLulu $tblRasioLulu)
    {
        abort_if(Gate::denies('tbl_rasio_lulu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblRasioLulus.show', compact('tblRasioLulu'));
    }

    public function destroy(TblRasioLulu $tblRasioLulu)
    {
        abort_if(Gate::denies('tbl_rasio_lulu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblRasioLulu->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblRasioLuluRequest $request)
    {
        TblRasioLulu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}