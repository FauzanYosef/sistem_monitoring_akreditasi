<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMenuDashboardRequest;
use App\Http\Requests\StoreMenuDashboardRequest;
use App\Http\Requests\UpdateMenuDashboardRequest;
use App\Models\DataPengajuan;
use App\Models\DataProdi;
use App\Models\DataPt;
use App\Models\Kodeprodi;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class MenuDashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('menu_dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPengajuans = DB::table('daftar_pengajuan')
                          ->leftJoin('users','users.id','=','daftar_pengajuan.created_by_id')
                          ->leftJoin('data_pts','data_pts.id','=','users.id_pt_id')
                          ->leftJoin('kodeprodis','kodeprodis.id','=','users.kode_prodi_id')
                          ->select('daftar_pengajuan.id as id','daftar_pengajuan.tahun_pengajuan as tahun_pengajuan','data_pts.nama_pt as nama_pt','kodeprodis.nama_prodi as nama_prodi')
                          ->get();
        return view('admin.menuDashboards.index',compact('dataPengajuans'));
    }

    public function create()
    {
        abort_if(Gate::denies('menu_dashboard_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuDashboards.create');
    }

    public function store(StoreMenuDashboardRequest $request)
    {
        $menuDashboard = MenuDashboard::create($request->all());

        return redirect()->route('admin.menu-dashboards.index');
    }

    public function edit(MenuDashboard $menuDashboard)
    {
        abort_if(Gate::denies('menu_dashboard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuDashboard->load('created_by');

        return view('admin.menuDashboards.edit', compact('menuDashboard'));
    }

    public function update(UpdateMenuDashboardRequest $request, MenuDashboard $menuDashboard)
    {
        $menuDashboard->update($request->all());

        return redirect()->route('admin.menu-dashboards.index');
    }

    public function show(DataPengajuan $dataPengajuans)
    {
        
        
        abort_if(Gate::denies('menu_dashboard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPengajuans->load('created_by')->get();
        // $dataPengajuans = DB::table('daftar_pengajuan')
        //                   ->leftJoin('users','users.id','=','daftar_pengajuan.created_by_id')
        //                   ->leftJoin('data_pts','data_pts.id','=','users.id_pt_id')
        //                   ->leftJoin('kodeprodis','kodeprodis.id','=','users.kode_prodi_id')
        //                   ->select('daftar_pengajuan.id as id','daftar_pengajuan.tahun_pengajuan as tahun_pengajuan','data_pts.nama_pt as nama_pt','kodeprodis.nama_prodi as nama_prodi',
        //                   'daftar_pengajuan.tbl_akre_prodis as tbl_akre_prodis','daftar_pengajuan.tbl_sertifikasi_eksternal as tbl_sertifikasi_eksternal')
        //                   ->where('daftar_pengajuan.id','=',"32")
        //                   ->get();
        return view('admin.menuDashboards.show',compact('dataPengajuans'));
    }

    public function destroy(MenuDashboard $menuDashboard)
    {
        abort_if(Gate::denies('menu_dashboard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuDashboard->delete();

        return back();
    }

    public function massDestroy(MassDestroyMenuDashboardRequest $request)
    {
        MenuDashboard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}