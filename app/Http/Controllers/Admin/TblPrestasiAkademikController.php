<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTblPrestasiAkademikRequest;
use App\Http\Requests\StoreTblPrestasiAkademikRequest;
use App\Http\Requests\UpdateTblPrestasiAkademikRequest;
use App\Models\TblPrestasiAkademik;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TblPrestasiAkademikController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tbl_prestasi_akademik_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPrestasiAkademiks = TblPrestasiAkademik::all();

        return view('admin.tblPrestasiAkademiks.index', compact('tblPrestasiAkademiks'));
    }

    public function create()
    {
        abort_if(Gate::denies('tbl_prestasi_akademik_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPrestasiAkademiks.create');
    }

    public function store(StoreTblPrestasiAkademikRequest $request)
    {
        $tblPrestasiAkademik = TblPrestasiAkademik::create($request->all());

        return redirect()->route('admin.tbl-prestasi-akademiks.index');
    }

    public function edit(TblPrestasiAkademik $tblPrestasiAkademik)
    {
        abort_if(Gate::denies('tbl_prestasi_akademik_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPrestasiAkademiks.edit', compact('tblPrestasiAkademik'));
    }

    public function update(UpdateTblPrestasiAkademikRequest $request, TblPrestasiAkademik $tblPrestasiAkademik)
    {
        $tblPrestasiAkademik->update($request->all());

        return redirect()->route('admin.tbl-prestasi-akademiks.index');
    }

    public function show(TblPrestasiAkademik $tblPrestasiAkademik)
    {
        abort_if(Gate::denies('tbl_prestasi_akademik_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tblPrestasiAkademiks.show', compact('tblPrestasiAkademik'));
    }

    public function destroy(TblPrestasiAkademik $tblPrestasiAkademik)
    {
        abort_if(Gate::denies('tbl_prestasi_akademik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tblPrestasiAkademik->delete();

        return back();
    }

    public function massDestroy(MassDestroyTblPrestasiAkademikRequest $request)
    {
        TblPrestasiAkademik::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}