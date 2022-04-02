<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataProdiRequest;
use App\Http\Requests\UpdateDataProdiRequest;
use App\Http\Resources\Admin\DataProdiResource;
use App\Models\DataProdi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataProdiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_prodi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataProdiResource(DataProdi::with(['id_pt', 'kode_prodi'])->get());
    }

    public function store(StoreDataProdiRequest $request)
    {
        $dataProdi = DataProdi::create($request->all());

        return (new DataProdiResource($dataProdi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataProdi $dataProdi)
    {
        abort_if(Gate::denies('data_prodi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataProdiResource($dataProdi->load(['id_pt', 'kode_prodi']));
    }

    public function update(UpdateDataProdiRequest $request, DataProdi $dataProdi)
    {
        $dataProdi->update($request->all());

        return (new DataProdiResource($dataProdi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataProdi $dataProdi)
    {
        abort_if(Gate::denies('data_prodi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataProdi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}