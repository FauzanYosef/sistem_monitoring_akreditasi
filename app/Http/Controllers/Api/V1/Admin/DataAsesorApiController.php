<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataAsesorRequest;
use App\Http\Requests\UpdateDataAsesorRequest;
use App\Http\Resources\Admin\DataAsesorResource;
use App\Models\DataAsesor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataAsesorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_asesor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataAsesorResource(DataAsesor::all());
    }

    public function store(StoreDataAsesorRequest $request)
    {
        $dataAsesor = DataAsesor::create($request->all());

        return (new DataAsesorResource($dataAsesor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataAsesor $dataAsesor)
    {
        abort_if(Gate::denies('data_asesor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataAsesorResource($dataAsesor);
    }

    public function update(UpdateDataAsesorRequest $request, DataAsesor $dataAsesor)
    {
        $dataAsesor->update($request->all());

        return (new DataAsesorResource($dataAsesor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataAsesor $dataAsesor)
    {
        abort_if(Gate::denies('data_asesor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataAsesor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}