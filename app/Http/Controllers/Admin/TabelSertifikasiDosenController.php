<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelSertifikasiDosenRequest;
use App\Http\Requests\StoreTabelSertifikasiDosenRequest;
use App\Http\Requests\UpdateTabelSertifikasiDosenRequest;
use App\Models\TabelSertifikasiDosen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\DataPengajuan;

class TabelSertifikasiDosenController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('tabel_sertifikasi_dosen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tabelSertifikasiDosens = TabelSertifikasiDosen::all();
        $tabelSertifikasiDosens = DB::table('tabel_sertifikasi_dosens')
                                ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_sertifikasi_dosens.id_tahun')
                                ->select('daftar_pengajuan.tahun_pengajuan as tahun','tabel_sertifikasi_dosens.*')
                                ->get();

        //return view('admin.tabelSeleksimhsbarus.index', compact('tabelSeleksimhsbarus'));

        return view('admin.tabelSertifikasiDosens.index', compact('tabelSertifikasiDosens'));
    }

    public function create()
    {
        abort_if(Gate::denies('tabel_sertifikasi_dosen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tabelSertifikasiDosens.create', compact('tahun_pengajuans'));

    }

    public function store(StoreTabelSertifikasiDosenRequest $request)
    {
        $tabelSertifikasiDosen = TabelSertifikasiDosen::create($request->all());

        return redirect()->route('admin.tabel-sertifikasi-dosens.index');
    }

    public function edit(TabelSertifikasiDosen $tabelSertifikasiDosen)
    {
        abort_if(Gate::denies('tabel_sertifikasi_dosen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelSertifikasiDosens.edit', compact('tabelSertifikasiDosen'));
    }

    public function update(UpdateTabelSertifikasiDosenRequest $request, TabelSertifikasiDosen $tabelSertifikasiDosen)
    {
        $tabelSertifikasiDosen->update($request->all());

        return redirect()->route('admin.tabel-sertifikasi-dosens.index');
    }

    public function show(TabelSertifikasiDosen $tabelSertifikasiDosen)
    {
        abort_if(Gate::denies('tabel_sertifikasi_dosen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelSertifikasiDosens.show', compact('tabelSertifikasiDosen'));
    }

    public function destroy(TabelSertifikasiDosen $tabelSertifikasiDosen)
    {
        abort_if(Gate::denies('tabel_sertifikasi_dosen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelSertifikasiDosen->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelSertifikasiDosenRequest $request)
    {
        TabelSertifikasiDosen::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}