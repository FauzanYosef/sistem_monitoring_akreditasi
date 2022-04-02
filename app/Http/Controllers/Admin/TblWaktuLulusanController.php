<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblWaktuLulusanRequest;
use App\Http\Requests\StoreTblWaktuLulusanRequest;
use App\Http\Requests\UpdateTblWaktuLulusanRequest;
use App\Models\TblWaktuLulusan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblWaktuLulusanController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_waktu_lulusan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblWaktuLulusans = TblWaktuLulusan::all();

        return view('admin.tblWaktuLulusans.index', compact('tblWaktuLulusans'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_waktu_lulusan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblWaktuLulusans.create');
    }

    public function store(StoreTblWaktuLulusanRequest $request)
    {
        $tblWaktuLulusan = TblWaktuLulusan::create($request->all());

        return redirect()->route('admin.tbl-waktu-lulusans.index');
    }

    public function edit(TblWaktuLulusan $tblWaktuLulusan)
    {
        abort_if(Gate::denies('tbl_waktu_lulusan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblWaktuLulusans.edit', compact('tblWaktuLulusan'));
    }

    public function update(UpdateTblWaktuLulusanRequest $request, TblWaktuLulusan $tblWaktuLulusan)
    {
        $tblWaktuLulusan->update($request->all());

        return redirect()->route('admin.tbl-waktu-lulusans.index');
    }

    public function show(TblWaktuLulusan $tblWaktuLulusan)
    {
        abort_if(Gate::denies('tbl_waktu_lulusan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblWaktuLulusans.show', compact('tblWaktuLulusan'));
    }

    public function destroy(TblWaktuLulusan $tblWaktuLulusan)
    {
        abort_if(Gate::denies('tbl_waktu_lulusan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblWaktuLulusan->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblWaktuLulusanRequest $request)
    {
        TblWaktuLulusan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}