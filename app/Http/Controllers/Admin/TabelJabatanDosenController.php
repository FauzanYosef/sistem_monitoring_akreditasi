<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelJabatanDosenRequest;
use App\Http\Requests\StoreTabelJabatanDosenRequest;
use App\Http\Requests\UpdateTabelJabatanDosenRequest;
use App\Models\TabelJabatanDosen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\DataPengajuan;

class TabelJabatanDosenController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_jabatan_dosen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelJabatanDosens = TabelJabatanDosen::all();
        $tabelJabatanDosens = DB::table('tabel_jabatan_dosens')
                                ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_jabatan_dosens.id_tahun')
                                ->select('daftar_pengajuan.tahun_pengajuan as tahun_id','tabel_jabatan_dosens.*')
                                ->get();

        return view('admin.tabelJabatanDosens.index', compact('tabelJabatanDosens'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_jabatan_dosen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelJabatanDosens.create', compact('tahun_pengajuans'));
    }

    public function store(StoreTabelJabatanDosenRequest $request)
    {
        $tabelJabatanDosen = TabelJabatanDosen::create($request->all());

        return redirect()->route('admin.tabel-jabatan-dosens.index');
    }

    public function edit(TabelJabatanDosen $tabelJabatanDosen)
    {
        abort_if(Gate::denies('tabel_jabatan_dosen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelJabatanDosens.edit', compact('tabelJabatanDosen'));
    }

    public function update(UpdateTabelJabatanDosenRequest $request, TabelJabatanDosen $tabelJabatanDosen)
    {
        $tabelJabatanDosen->update($request->all());

        return redirect()->route('admin.tabel-jabatan-dosens.index');
    }

    public function show(TabelJabatanDosen $tabelJabatanDosen)
    {
        abort_if(Gate::denies('tabel_jabatan_dosen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelJabatanDosens.show', compact('tabelJabatanDosen'));
    }

    public function destroy(TabelJabatanDosen $tabelJabatanDosen)
    {
        abort_if(Gate::denies('tabel_jabatan_dosen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelJabatanDosen->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelJabatanDosenRequest $request)
    {
        TabelJabatanDosen::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}