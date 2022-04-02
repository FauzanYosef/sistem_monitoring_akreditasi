<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblLuaranLainnyaRequest;
use App\Http\Requests\StoreTblLuaranLainnyaRequest;
use App\Http\Requests\UpdateTblLuaranLainnyaRequest;
use App\Models\TblLuaranLainnya;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblLuaranLainnyaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_luaran_lainnya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblLuaranLainnyas = TblLuaranLainnya::all();

        return view('admin.tblLuaranLainnyas.index', compact('tblLuaranLainnyas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_luaran_lainnya_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblLuaranLainnyas.create');
    }

    public function store(StoreTblLuaranLainnyaRequest $request)
    {
        $tblLuaranLainnya = TblLuaranLainnya::create($request->all());

        return redirect()->route('admin.tbl-luaran-lainnyas.index');
    }

    public function edit(TblLuaranLainnya $tblLuaranLainnya)
    {
        abort_if(Gate::denies('tbl_luaran_lainnya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblLuaranLainnyas.edit', compact('tblLuaranLainnya'));
    }

    public function update(UpdateTblLuaranLainnyaRequest $request, TblLuaranLainnya $tblLuaranLainnya)
    {
        $tblLuaranLainnya->update($request->all());

        return redirect()->route('admin.tbl-luaran-lainnyas.index');
    }

    public function show(TblLuaranLainnya $tblLuaranLainnya)
    {
        abort_if(Gate::denies('tbl_luaran_lainnya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblLuaranLainnyas.show', compact('tblLuaranLainnya'));
    }

    public function destroy(TblLuaranLainnya $tblLuaranLainnya)
    {
        abort_if(Gate::denies('tbl_luaran_lainnya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblLuaranLainnya->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblLuaranLainnyaRequest $request)
    {
        TblLuaranLainnya::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}