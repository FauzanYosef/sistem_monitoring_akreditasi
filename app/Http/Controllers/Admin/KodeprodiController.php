<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKodeprodiRequest;
use App\Http\Requests\StoreKodeprodiRequest;
use App\Http\Requests\UpdateKodeprodiRequest;
use App\Models\Kodeprodi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KodeprodiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kodeprodi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kodeprodis = Kodeprodi::all();

        return view('admin.kodeprodis.index', compact('kodeprodis'));
    }

    public function create()
    {
        abort_if(Gate::denies('kodeprodi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kodeprodis.create');
    }

    public function store(StoreKodeprodiRequest $request)
    {
        $kodeprodi = Kodeprodi::create($request->all());

        return redirect()->route('admin.kodeprodis.index');
    }

    public function edit(Kodeprodi $kodeprodi)
    {
        abort_if(Gate::denies('kodeprodi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kodeprodis.edit', compact('kodeprodi'));
    }

    public function update(UpdateKodeprodiRequest $request, Kodeprodi $kodeprodi)
    {
        $kodeprodi->update($request->all());

        return redirect()->route('admin.kodeprodis.index');
    }

    public function show(Kodeprodi $kodeprodi)
    {
        abort_if(Gate::denies('kodeprodi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kodeprodis.show', compact('kodeprodi'));
    }

    public function destroy(Kodeprodi $kodeprodi)
    {
        abort_if(Gate::denies('kodeprodi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kodeprodi->delete();

        return back();
    }

    public function massDestroy(MassDestroyKodeprodiRequest $request)
    {
        Kodeprodi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}