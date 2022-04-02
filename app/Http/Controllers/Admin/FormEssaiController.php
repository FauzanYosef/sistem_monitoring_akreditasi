<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFormEssaiRequest;
use App\Http\Requests\StoreFormEssaiRequest;
use App\Http\Requests\UpdateFormEssaiRequest;
use App\Models\FormEssai;
use App\Models\IndikatorPenilaian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormEssaiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('form_essai_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formEssais = FormEssai::with(['elemen'])->get();

        return view('admin.formEssais.index', compact('formEssais'));
    }

    public function create()
    {
        abort_if(Gate::denies('form_essai_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elemens = IndikatorPenilaian::pluck('elemen', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.formEssais.create', compact('elemens'));
    }

    public function store(StoreFormEssaiRequest $request)
    {
        $formEssai = FormEssai::create($request->all());

        return redirect()->route('admin.form-essais.index');
    }

    public function edit(FormEssai $formEssai)
    {
        abort_if(Gate::denies('form_essai_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elemens = IndikatorPenilaian::pluck('elemen', 'id')->prepend(trans('global.pleaseSelect'), '');

        $formEssai->load('elemen');

        return view('admin.formEssais.edit', compact('elemens', 'formEssai'));
    }

    public function update(UpdateFormEssaiRequest $request, FormEssai $formEssai)
    {
        $formEssai->update($request->all());

        return redirect()->route('admin.form-essais.index');
    }

    public function show(FormEssai $formEssai)
    {
        abort_if(Gate::denies('form_essai_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formEssai->load('elemen');

        return view('admin.formEssais.show', compact('formEssai'));
    }

    public function destroy(FormEssai $formEssai)
    {
        abort_if(Gate::denies('form_essai_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formEssai->delete();

        return back();
    }

    public function massDestroy(MassDestroyFormEssaiRequest $request)
    {
        FormEssai::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}