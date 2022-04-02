<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelSeleksimhsbaruRequest;
use App\Http\Requests\StoreTabelSeleksimhsbaruRequest;
use App\Http\Requests\UpdateTabelSeleksimhsbaruRequest;
use App\Models\TabelSeleksimhsbaru;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\DataPengajuan;

class TabelSeleksimhsbaruController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_seleksimhsbaru_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelSeleksimhsbarus = TabelSeleksimhsbaru::all();
        $tabelSeleksimhsbarus = DB::table('tabel_seleksimhsbarus')
                                ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_seleksimhsbarus.id_tahun')
                                ->select('daftar_pengajuan.tahun_pengajuan as tahun','tabel_seleksimhsbarus.*')
                                ->get();

        return view('admin.tabelSeleksimhsbarus.index', compact('tabelSeleksimhsbarus'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_seleksimhsbaru_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelSeleksimhsbarus.create', compact('tahun_pengajuans'));
        //return view('admin.tabelSeleksimhsbarus.create');
    }

    public function store(StoreTabelSeleksimhsbaruRequest $request)
    {
        $tabelSeleksimhsbaru = TabelSeleksimhsbaru::create($request->all());

        return redirect()->route('admin.tabel-seleksimhsbarus.index');
    }

    public function edit(TabelSeleksimhsbaru $tabelSeleksimhsbaru)
    {
        abort_if(Gate::denies('tabel_seleksimhsbaru_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelSeleksimhsbarus.edit', compact('tabelSeleksimhsbaru'));
    }

    public function update(UpdateTabelSeleksimhsbaruRequest $request, TabelSeleksimhsbaru $tabelSeleksimhsbaru)
    {
        $tabelSeleksimhsbaru->update($request->all());

        return redirect()->route('admin.tabel-seleksimhsbarus.index');
    }

    public function show(TabelSeleksimhsbaru $tabelSeleksimhsbaru)
    {
        abort_if(Gate::denies('tabel_seleksimhsbaru_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelSeleksimhsbarus.show', compact('tabelSeleksimhsbaru'));
    }

    public function destroy(TabelSeleksimhsbaru $tabelSeleksimhsbaru)
    {
        abort_if(Gate::denies('tabel_seleksimhsbaru_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelSeleksimhsbaru->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelSeleksimhsbaruRequest $request)
    {
        TabelSeleksimhsbaru::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}