<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPengajuan extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const tahun_pengajuan_SELECT = [
        '2000'  => '2000',
        '2001'  => '2001',
        '2002'  => '2002',
        '2003'  => '2003',
        '2004'  => '2004',
        '2005'  => '2005',
        '2006'  => '2006',
        '2007'  => '2007',
        '2008'  => '2008',
        '2009' => '2009',
        '2010' => '2010',
        '2011' => '2011',
        '2012' => '2012',
        '2013' => '2013',
        '2014' => '2014',
        '2015' => '2015',
        '2016' => '2016',
        '2017' => '2017',
        '2018' => '2018',
        '2019' => '2019',
        '2020' => '2020',
        '2021' => '2021',
        '2022' => '2022',
        
    ];

    public $table = 'daftar_pengajuan';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tahun_pengajuan',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
        'nama_pt',
        'nama_prodi',

    ];
    // public function id()
    // {
    //     return $this->belongsTo(User::class, 'creatided_by_id');
    // }
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    public function id_pt()
    {
        return $this->belongsTo(User::class, 'nama_pt');
    }
    public function kode_prodi()
    {
        return $this->belongsTo(User::class, 'nama_prodi');
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}