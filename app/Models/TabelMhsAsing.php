<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelMhsAsing extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public $table = 'tabel_mhs_asings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'prodi_id',
        'id_tahun',
        'ts_2',
        'ts_1',
        'ts',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function prodi()
    {
        return $this->belongsTo(Kodeprodi::class, 'prodi_id');
    }
    public function tahun_pengajuan()
    {
        return $this->belongsTo(DataPengajuan::class, 'id_tahun');
    }
    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}