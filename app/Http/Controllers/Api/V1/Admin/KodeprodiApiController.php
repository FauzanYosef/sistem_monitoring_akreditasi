<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKodeprodiRequest;
use App\Http\Requests\UpdateKodeprodiRequest;
use App\Http\Resources\Admin\KodeprodiResource;
use App\Models\Kodeprodi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KodeprodiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kodeprodi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KodeprodiResource(Kodeprodi::all());
    }

    public function store(StoreKodeprodiRequest $request)
    {
        $kodeprodi = Kodeprodi::create($request->all());

        return (new KodeprodiResource($kodeprodi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Kodeprodi $kodeprodi)
    {
        abort_if(Gate::denies('kodeprodi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KodeprodiResource($kodeprodi);
    }

    public function update(UpdateKodeprodiRequest $request, Kodeprodi $kodeprodi)
    {
        $kodeprodi->update($request->all());

        return (new KodeprodiResource($kodeprodi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Kodeprodi $kodeprodi)
    {
        abort_if(Gate::denies('kodeprodi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kodeprodi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}