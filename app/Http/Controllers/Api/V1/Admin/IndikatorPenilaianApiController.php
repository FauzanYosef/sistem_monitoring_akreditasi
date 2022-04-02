<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndikatorPenilaianRequest;
use App\Http\Requests\UpdateIndikatorPenilaianRequest;
use App\Http\Resources\Admin\IndikatorPenilaianResource;
use App\Models\IndikatorPenilaian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndikatorPenilaianApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('indikator_penilaian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndikatorPenilaianResource(IndikatorPenilaian::all());
    }

    public function store(StoreIndikatorPenilaianRequest $request)
    {
        $indikatorPenilaian = IndikatorPenilaian::create($request->all());

        return (new IndikatorPenilaianResource($indikatorPenilaian))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IndikatorPenilaian $indikatorPenilaian)
    {
        abort_if(Gate::denies('indikator_penilaian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndikatorPenilaianResource($indikatorPenilaian);
    }

    public function update(UpdateIndikatorPenilaianRequest $request, IndikatorPenilaian $indikatorPenilaian)
    {
        $indikatorPenilaian->update($request->all());

        return (new IndikatorPenilaianResource($indikatorPenilaian))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IndikatorPenilaian $indikatorPenilaian)
    {
        abort_if(Gate::denies('indikator_penilaian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indikatorPenilaian->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}