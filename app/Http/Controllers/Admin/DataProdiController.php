<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDataProdiRequest;
use App\Http\Requests\StoreDataProdiRequest;
use App\Http\Requests\UpdateDataProdiRequest;
use App\Models\DataProdi;
use App\Models\DataPt;
use App\Models\Kodeprodi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataProdiController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('data_prodi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataProdis = DataProdi::with(['id_pt', 'kode_prodi'])->get();

        return view('admin.dataProdis.index', compact('dataProdis'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_prodi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_pts = DataPt::pluck('nama_pt', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kode_prodis = Kodeprodi::pluck('nama_prodi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dataProdis.create', compact('id_pts', 'kode_prodis'));
    }

    public function store(StoreDataProdiRequest $request)
    {
        $dataProdi = DataProdi::create($request->all());

        return redirect()->route('admin.data-prodis.index');
    }

    public function edit(DataProdi $dataProdi)
    {
        abort_if(Gate::denies('data_prodi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_pts = DataPt::pluck('nama_pt', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kode_prodis = Kodeprodi::pluck('nama_prodi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dataProdi->load('id_pt', 'kode_prodi');

        return view('admin.dataProdis.edit', compact('id_pts', 'kode_prodis', 'dataProdi'));
    }

    public function update(UpdateDataProdiRequest $request, DataProdi $dataProdi)
    {
        $dataProdi->update($request->all());

        return redirect()->route('admin.data-prodis.index');
    }

    public function show(DataProdi $dataProdi)
    {
        abort_if(Gate::denies('data_prodi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataProdi->load('id_pt', 'kode_prodi');

        return view('admin.dataProdis.show', compact('dataProdi'));
    }

    public function destroy(DataProdi $dataProdi)
    {
        abort_if(Gate::denies('data_prodi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataProdi->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataProdiRequest $request)
    {
        DataProdi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}