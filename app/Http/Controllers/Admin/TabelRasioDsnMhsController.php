<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelRasioDsnMhRequest;
use App\Http\Requests\StoreTabelRasioDsnMhRequest;
use App\Http\Requests\UpdateTabelRasioDsnMhRequest;
use App\Models\TabelRasioDsnMh;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TabelRasioDsnMhsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_rasio_dsn_mh_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelRasioDsnMhs = TabelRasioDsnMh::all();

        return view('admin.tabelRasioDsnMhs.index', compact('tabelRasioDsnMhs'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_rasio_dsn_mh_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelRasioDsnMhs.create');
    }

    public function store(StoreTabelRasioDsnMhRequest $request)
    {
        $tabelRasioDsnMh = TabelRasioDsnMh::create($request->all());

        return redirect()->route('admin.tabel-rasio-dsn-mhs.index');
    }

    public function edit(TabelRasioDsnMh $tabelRasioDsnMh)
    {
        abort_if(Gate::denies('tabel_rasio_dsn_mh_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelRasioDsnMhs.edit', compact('tabelRasioDsnMh'));
    }

    public function update(UpdateTabelRasioDsnMhRequest $request, TabelRasioDsnMh $tabelRasioDsnMh)
    {
        $tabelRasioDsnMh->update($request->all());

        return redirect()->route('admin.tabel-rasio-dsn-mhs.index');
    }

    public function show(TabelRasioDsnMh $tabelRasioDsnMh)
    {
        abort_if(Gate::denies('tabel_rasio_dsn_mh_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelRasioDsnMhs.show', compact('tabelRasioDsnMh'));
    }

    public function destroy(TabelRasioDsnMh $tabelRasioDsnMh)
    {
        abort_if(Gate::denies('tabel_rasio_dsn_mh_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelRasioDsnMh->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelRasioDsnMhRequest $request)
    {
        TabelRasioDsnMh::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}