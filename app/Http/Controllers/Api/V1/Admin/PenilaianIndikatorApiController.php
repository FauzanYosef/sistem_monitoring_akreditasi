<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenilaianIndikatorRequest;
use App\Http\Requests\UpdatePenilaianIndikatorRequest;
use App\Http\Resources\Admin\PenilaianIndikatorResource;
use App\Models\PenilaianIndikator;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenilaianIndikatorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('penilaian_indikator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PenilaianIndikatorResource(PenilaianIndikator::with(['indikator_skor'])->get());
    }

    public function store(StorePenilaianIndikatorRequest $request)
    {
        $penilaianIndikator = PenilaianIndikator::create($request->all());

        return (new PenilaianIndikatorResource($penilaianIndikator))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PenilaianIndikator $penilaianIndikator)
    {
        abort_if(Gate::denies('penilaian_indikator_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PenilaianIndikatorResource($penilaianIndikator->load(['indikator_skor']));
    }

    public function update(UpdatePenilaianIndikatorRequest $request, PenilaianIndikator $penilaianIndikator)
    {
        $penilaianIndikator->update($request->all());

        return (new PenilaianIndikatorResource($penilaianIndikator))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PenilaianIndikator $penilaianIndikator)
    {
        abort_if(Gate::denies('penilaian_indikator_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penilaianIndikator->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}