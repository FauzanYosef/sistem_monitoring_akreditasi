<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDataPengajuanRequest;
use App\Http\Requests\StoreDataPengajuanRequest;
use App\Http\Requests\UpdateDataPengajuanRequest;
use App\Models\DataPengajuan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataPengajuanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_pengajuan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPengajuans = DataPengajuan::with(['created_by'])->get();

        return view('admin.daftarPengajuans.index', compact('dataPengajuans'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_pengajuan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.daftarPengajuans.create');
    }

    public function store(StoreDataPengajuanRequest $request)
    {
        $tahun = $request->input('tahun_pengajuan');
        $cekdata = DataPengajuan::where('tahun_pengajuan',$tahun)->get();
        //dd($cekdata);
        if(!$cekdata->isEmpty()){
            //dd("if");
            //$data['status'] = "gagal";
            return redirect()->route('admin.data-pengajuans.index')->with('alert','Gagal Disimpan. Data Sudah Ada!');
        }else{
            //dd("else");
            $dataPengajuan = DataPengajuan::create($request->all());
            //$data['status'] = "sukses";
            return redirect()->route('admin.data-pengajuans.index');
        }
    }

    public function edit(DataPengajuan $dataPengajuan)
    {
        abort_if(Gate::denies('data_pengajuan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPengajuan->load('created_by');

        return view('admin.daftarPengajuans.edit', compact('dataPengajuan'));
    }

    public function update(UpdateDataPengajuanRequest $request, DataPengajuan $dataPengajuan)
    {
        $dataPengajuan->update($request->all());

        return redirect()->route('admin.data-pengajuans.index');
    }

    public function show(DataPengajuan $dataPengajuan)
    {
        abort_if(Gate::denies('data_pengajuan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPengajuan->load('created_by');

        return view('admin.daftarPengajuans.show', compact('dataPengajuan'));
    }

    public function destroy(DataPengajuan $dataPengajuan)
    {
        abort_if(Gate::denies('data_pengajuan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPengajuan->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataPengajuanRequest $request)
    {
        DataPengajuan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}