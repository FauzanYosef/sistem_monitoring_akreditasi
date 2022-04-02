<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblKepuasanRequest;
use App\Http\Requests\StoreTblKepuasanRequest;
use App\Http\Requests\UpdateTblKepuasanRequest;
use App\Models\TblKepuasan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblKepuasanController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_kepuasan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblKepuasans = TblKepuasan::all();

        return view('admin.tblKepuasans.index', compact('tblKepuasans'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_kepuasan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblKepuasans.create');
    }

    public function store(StoreTblKepuasanRequest $request)
    {
        $tblKepuasan = TblKepuasan::create($request->all());

        return redirect()->route('admin.tbl-kepuasans.index');
    }

    public function edit(TblKepuasan $tblKepuasan)
    {
        abort_if(Gate::denies('tbl_kepuasan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblKepuasans.edit', compact('tblKepuasan'));
    }

    public function update(UpdateTblKepuasanRequest $request, TblKepuasan $tblKepuasan)
    {
        $tblKepuasan->update($request->all());

        return redirect()->route('admin.tbl-kepuasans.index');
    }

    public function show(TblKepuasan $tblKepuasan)
    {
        abort_if(Gate::denies('tbl_kepuasan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblKepuasans.show', compact('tblKepuasan'));
    }

    public function destroy(TblKepuasan $tblKepuasan)
    {
        abort_if(Gate::denies('tbl_kepuasan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblKepuasan->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblKepuasanRequest $request)
    {
        TblKepuasan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}