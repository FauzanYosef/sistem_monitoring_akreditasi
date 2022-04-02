<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelRekognisiDosenRequest;
use App\Http\Requests\StoreTabelRekognisiDosenRequest;
use App\Http\Requests\UpdateTabelRekognisiDosenRequest;
use App\Models\TabelRekognisiDosen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TabelRekognisiDosenController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_rekognisi_dosen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelRekognisiDosens = TabelRekognisiDosen::all();

        return view('admin.tabelRekognisiDosens.index', compact('tabelRekognisiDosens'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_rekognisi_dosen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelRekognisiDosens.create');
    }

    public function store(StoreTabelRekognisiDosenRequest $request)
    {
        $tabelRekognisiDosen = TabelRekognisiDosen::create($request->all());

        return redirect()->route('admin.tabel-rekognisi-dosens.index');
    }

    public function edit(TabelRekognisiDosen $tabelRekognisiDosen)
    {
        abort_if(Gate::denies('tabel_rekognisi_dosen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelRekognisiDosens.edit', compact('tabelRekognisiDosen'));
    }

    public function update(UpdateTabelRekognisiDosenRequest $request, TabelRekognisiDosen $tabelRekognisiDosen)
    {
        $tabelRekognisiDosen->update($request->all());

        return redirect()->route('admin.tabel-rekognisi-dosens.index');
    }

    public function show(TabelRekognisiDosen $tabelRekognisiDosen)
    {
        abort_if(Gate::denies('tabel_rekognisi_dosen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelRekognisiDosens.show', compact('tabelRekognisiDosen'));
    }

    public function destroy(TabelRekognisiDosen $tabelRekognisiDosen)
    {
        abort_if(Gate::denies('tabel_rekognisi_dosen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelRekognisiDosen->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelRekognisiDosenRequest $request)
    {
        TabelRekognisiDosen::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}