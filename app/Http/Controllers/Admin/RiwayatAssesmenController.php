<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRiwayatAssesmanRequest;
use App\Http\Requests\StoreRiwayatAssesmanRequest;
use App\Http\Requests\UpdateRiwayatAssesmanRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RiwayatAssesmenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('riwayat_assesman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.riwayatAssesmen.index');
    }

    public function create()
    {
        abort_if(Gate::denies('riwayat_assesman_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.riwayatAssesmen.create');
    }

    public function store(StoreRiwayatAssesmanRequest $request)
    {
        $riwayatAssesman = RiwayatAssesman::create($request->all());

        return redirect()->route('admin.riwayat-assesmen.index');
    }

    public function edit(RiwayatAssesman $riwayatAssesman)
    {
        abort_if(Gate::denies('riwayat_assesman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.riwayatAssesmen.edit', compact('riwayatAssesman'));
    }

    public function update(UpdateRiwayatAssesmanRequest $request, RiwayatAssesman $riwayatAssesman)
    {
        $riwayatAssesman->update($request->all());

        return redirect()->route('admin.riwayat-assesmen.index');
    }

    public function show(RiwayatAssesman $riwayatAssesman)
    {
        abort_if(Gate::denies('riwayat_assesman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.riwayatAssesmen.show', compact('riwayatAssesman'));
    }

    public function destroy(RiwayatAssesman $riwayatAssesman)
    {
        abort_if(Gate::denies('riwayat_assesman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riwayatAssesman->delete();

        return back();
    }

    public function massDestroy(MassDestroyRiwayatAssesmanRequest $request)
    {
        RiwayatAssesman::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}