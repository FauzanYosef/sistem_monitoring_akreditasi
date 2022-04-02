<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTabelSertifikasiEksternalRequest;
use App\Http\Requests\StoreTabelSertifikasiEksternalRequest;
use App\Http\Requests\UpdateTabelSertifikasiEksternalRequest;
use App\Models\TabelSertifikasiEksternal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\DataPengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TabelSertifikasiEksternalController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        //dd(Storage::disk('local'));
        abort_if(Gate::denies('tabel_sertifikasi_eksternal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $iduserlogin = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        //$iduserlogin = "8";
        //$tabelSertifikasiEksternals = TabelSertifikasiEksternal::all();
        $tabelSertifikasiEksternals = DB::table('tabel_sertifikasi_eksternals')
                          ->leftJoin('daftar_pengajuan','daftar_pengajuan.id','=','tabel_sertifikasi_eksternals.id_tahun')
                          ->select('daftar_pengajuan.tahun_pengajuan as tahun','tabel_sertifikasi_eksternals.*')
                          ->where('tabel_sertifikasi_eksternals.created_by_id','=',$iduserlogin)
                          ->get();

        return view('admin.tabelSertifikasiEksternals.index', compact('tabelSertifikasiEksternals'));
    }
    // public function create()
    // {
    //     abort_if(Gate::denies('form_essai_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $elemens = IndikatorPenilaian::pluck('elemen', 'id')->prepend(trans('global.pleaseSelect'), '');

    //     return view('admin.formEssais.create', compact('elemens'));
    // }
    public function create()
    {
        abort_if(Gate::denies('tabel_sertifikasi_eksternal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $tahun_pengajuans = DataPengajuan::pluck('tahun_pengajuan', 'id')->prepend(trans('global.pleaseSelect'), '');
 
        return view('admin.tabelSertifikasiEksternals.create', compact('tahun_pengajuans'));
    }

    public function store(StoreTabelSertifikasiEksternalRequest $request)
    {
        $tabelSertifikasiEksternal = TabelSertifikasiEksternal::create($request->all());

        return redirect()->route('admin.tabel-sertifikasi-eksternals.index');
    }

    public function edit(TabelSertifikasiEksternal $tabelSertifikasiEksternal)
    {
        abort_if(Gate::denies('tabel_sertifikasi_eksternal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelSertifikasiEksternals.edit', compact('tabelSertifikasiEksternal'));
    }

    public function update(UpdateTabelSertifikasiEksternalRequest $request, TabelSertifikasiEksternal $tabelSertifikasiEksternal)
    {
        $tabelSertifikasiEksternal->update($request->all());

        return redirect()->route('admin.tabel-sertifikasi-eksternals.index');
    }

    public function show(TabelSertifikasiEksternal $tabelSertifikasiEksternal)
    {
        //dd("masuk view");
        abort_if(Gate::denies('tabel_sertifikasi_eksternal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tabelSertifikasiEksternals.show', compact('tabelSertifikasiEksternal'));
    }

    public function destroy(TabelSertifikasiEksternal $tabelSertifikasiEksternal)
    {
        dd("maasuk destroy");
        abort_if(Gate::denies('tabel_sertifikasi_eksternal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tabelSertifikasiEksternal->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabelSertifikasiEksternalRequest $request)
    {
        dd("maasuk destroy 2");
        TabelSertifikasiEksternal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}