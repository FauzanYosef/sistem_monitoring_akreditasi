<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblPublikasiIlmiahRequest;
use App\Http\Requests\StoreTblPublikasiIlmiahRequest;
use App\Http\Requests\UpdateTblPublikasiIlmiahRequest;
use App\Models\TblPublikasiIlmiah;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblPublikasiIlmiahController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_publikasi_ilmiah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPublikasiIlmiahs = TblPublikasiIlmiah::all();

        return view('admin.tblPublikasiIlmiahs.index', compact('tblPublikasiIlmiahs'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_publikasi_ilmiah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPublikasiIlmiahs.create');
    }

    public function store(StoreTblPublikasiIlmiahRequest $request)
    {
        $tblPublikasiIlmiah = TblPublikasiIlmiah::create($request->all());

        return redirect()->route('admin.tbl-publikasi-ilmiahs.index');
    }

    public function edit(TblPublikasiIlmiah $tblPublikasiIlmiah)
    {
        abort_if(Gate::denies('tbl_publikasi_ilmiah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPublikasiIlmiahs.edit', compact('tblPublikasiIlmiah'));
    }

    public function update(UpdateTblPublikasiIlmiahRequest $request, TblPublikasiIlmiah $tblPublikasiIlmiah)
    {
        $tblPublikasiIlmiah->update($request->all());

        return redirect()->route('admin.tbl-publikasi-ilmiahs.index');
    }

    public function show(TblPublikasiIlmiah $tblPublikasiIlmiah)
    {
        abort_if(Gate::denies('tbl_publikasi_ilmiah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPublikasiIlmiahs.show', compact('tblPublikasiIlmiah'));
    }

    public function destroy(TblPublikasiIlmiah $tblPublikasiIlmiah)
    {
        abort_if(Gate::denies('tbl_publikasi_ilmiah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPublikasiIlmiah->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblPublikasiIlmiahRequest $request)
    {
        TblPublikasiIlmiah::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}