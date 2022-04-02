<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelPkmDsnRequest;
use App\Http\Requests\StoreTabelPkmDsnRequest;
use App\Http\Requests\UpdateTabelPkmDsnRequest;
use App\Models\TabelPkmDsn;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TabelPkmDsnController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_pkm_dsn_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelPkmDsns = TabelPkmDsn::all();

        return view('admin.tabelPkmDsns.index', compact('tabelPkmDsns'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_pkm_dsn_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelPkmDsns.create');
    }

    public function store(StoreTabelPkmDsnRequest $request)
    {
        $tabelPkmDsn = TabelPkmDsn::create($request->all());

        return redirect()->route('admin.tabel-pkm-dsns.index');
    }

    public function edit(TabelPkmDsn $tabelPkmDsn)
    {
        abort_if(Gate::denies('tabel_pkm_dsn_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelPkmDsns.edit', compact('tabelPkmDsn'));
    }

    public function update(UpdateTabelPkmDsnRequest $request, TabelPkmDsn $tabelPkmDsn)
    {
        $tabelPkmDsn->update($request->all());

        return redirect()->route('admin.tabel-pkm-dsns.index');
    }

    public function show(TabelPkmDsn $tabelPkmDsn)
    {
        abort_if(Gate::denies('tabel_pkm_dsn_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelPkmDsns.show', compact('tabelPkmDsn'));
    }

    public function destroy(TabelPkmDsn $tabelPkmDsn)
    {
        abort_if(Gate::denies('tabel_pkm_dsn_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelPkmDsn->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelPkmDsnRequest $request)
    {
        TabelPkmDsn::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}