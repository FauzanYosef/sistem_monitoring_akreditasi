<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBorangRequest;
use App\Http\Requests\StoreBorangRequest;
use App\Http\Requests\UpdateBorangRequest;
use App\Models\Borang;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BorangController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('borang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borangs = Borang::all();

        return view('admin.borangs.index', compact('borangs'));
    }

    public function create()
    {
        abort_if(Gate::denies('borang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.borangs.create');
    }

    public function store(StoreBorangRequest $request)
    {
        $borang = Borang::create($request->all());

        return redirect()->route('admin.borangs.index');
    }

    public function edit(Borang $borang)
    {
        abort_if(Gate::denies('borang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.borangs.edit', compact('borang'));
    }

    public function update(UpdateBorangRequest $request, Borang $borang)
    {
        $borang->update($request->all());

        return redirect()->route('admin.borangs.index');
    }

    public function show(Borang $borang)
    {
        abort_if(Gate::denies('borang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.borangs.show', compact('borang'));
    }

    public function destroy(Borang $borang)
    {
        abort_if(Gate::denies('borang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borang->delete();

        return back();
    }

    public function massDestroy(MassDestroyBorangRequest $request)
    {
        Borang::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}