<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelPenelitianDosenRequest;
use App\Http\Requests\StoreTabelPenelitianDosenRequest;
use App\Http\Requests\UpdateTabelPenelitianDosenRequest;
use App\Models\TabelPenelitianDosen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TabelPenelitianDosenController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_penelitian_dosen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelPenelitianDosens = TabelPenelitianDosen::all();

        return view('admin.tabelPenelitianDosens.index', compact('tabelPenelitianDosens'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_penelitian_dosen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelPenelitianDosens.create');
    }

    public function store(StoreTabelPenelitianDosenRequest $request)
    {
        $tabelPenelitianDosen = TabelPenelitianDosen::create($request->all());

        return redirect()->route('admin.tabel-penelitian-dosens.index');
    }

    public function edit(TabelPenelitianDosen $tabelPenelitianDosen)
    {
        abort_if(Gate::denies('tabel_penelitian_dosen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelPenelitianDosens.edit', compact('tabelPenelitianDosen'));
    }

    public function update(UpdateTabelPenelitianDosenRequest $request, TabelPenelitianDosen $tabelPenelitianDosen)
    {
        $tabelPenelitianDosen->update($request->all());

        return redirect()->route('admin.tabel-penelitian-dosens.index');
    }

    public function show(TabelPenelitianDosen $tabelPenelitianDosen)
    {
        abort_if(Gate::denies('tabel_penelitian_dosen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelPenelitianDosens.show', compact('tabelPenelitianDosen'));
    }

    public function destroy(TabelPenelitianDosen $tabelPenelitianDosen)
    {
        abort_if(Gate::denies('tabel_penelitian_dosen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelPenelitianDosen->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelPenelitianDosenRequest $request)
    {
        TabelPenelitianDosen::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}