<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataPtRequest;
use App\Http\Requests\UpdateDataPtRequest;
use App\Http\Resources\Admin\DataPtResource;
use App\Models\DataPt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataPtApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_pt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataPtResource(DataPt::all());
    }

    public function store(StoreDataPtRequest $request)
    {
        $dataPt = DataPt::create($request->all());

        return (new DataPtResource($dataPt))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataPt $dataPt)
    {
        abort_if(Gate::denies('data_pt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataPtResource($dataPt);
    }

    public function update(UpdateDataPtRequest $request, DataPt $dataPt)
    {
        $dataPt->update($request->all());

        return (new DataPtResource($dataPt))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataPt $dataPt)
    {
        abort_if(Gate::denies('data_pt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPt->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}