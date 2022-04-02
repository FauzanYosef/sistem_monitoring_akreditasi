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
//use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Response;

use Eloquent;


class HomeController
{
    public function index()
    
    {
        $user = auth()->user();
        $dataPengajuans = DB::table('daftar_pengajuan')
                          ->leftJoin('users','users.id','=','daftar_pengajuan.created_by_id')
                          ->leftJoin('data_pts','data_pts.id','=','users.id_pt_id')
                          ->leftJoin('kodeprodis','kodeprodis.id','=','users.kode_prodi_id')
                          ->select('daftar_pengajuan.id as id','daftar_pengajuan.tahun_pengajuan as tahun_pengajuan','data_pts.nama_pt as nama_pt','kodeprodis.nama_prodi as nama_prodi')
                          ->where('users.id','=',$user->id)
                          ->get();
        return view('home',compact('dataPengajuans'));
    }
    
    public function show(DataPengajuan $dataPengajuans,$key)
    {
        $id = $key;
        //abort_if(Gate::denies('menu_dashboard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $dataPengajuans = dataPengajuan();
        $dataPengajuans = DB::table('daftar_pengajuan')
                          ->select('*')
                          ->where('daftar_pengajuan.id','=',$id)
                          ->get();
        return view('admin.menuDashboards.show',compact('dataPengajuans'));
    }

    public function getDownloada(){
        //PDF file is stored under project/public/download/info.pdf
        $file="C:/TA(Project)/web_akreditasi/storage/app/masterfile/PenilaianIAPT.xlsx";
        return Response::download($file);
}
public function getDownloadb(){
    //PDF file is stored under project/public/download/info.pdf
    $file="C:/TA(Project)/web_akreditasi/storage/app/masterfile/APT9A.xlsx";
    return Response::download($file);
}

}