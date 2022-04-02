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
use Eloquent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // abort_if(Gate::denies('menu_dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dataPengajuans = DB::table('daftar_pengajuan')
                          ->leftJoin('users','users.id','=','daftar_pengajuan.created_by_id')
                          ->leftJoin('data_pts','data_pts.id','=','users.id_pt_id')
                          ->leftJoin('kodeprodis','kodeprodis.id','=','users.kode_prodi_id')
                          ->select('daftar_pengajuan.id as id','daftar_pengajuan.tahun_pengajuan as tahun_pengajuan','data_pts.nama_pt as nama_pt','kodeprodis.nama_prodi as nama_prodi')
                          ->get();
        return view('home',compact('dataPengajuans'));
    }
    //  public function index()
    // {
    //     return view('home');
    // }
}