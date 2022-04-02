<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelKckpanDsn extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const PENGELOLA_SELECT = [
        '1' => 'Fakultas',
        '2' => 'Departemen',
        '3' => 'Jurusan',
    ];

    public $table = 'tabel_kckpan_dsns';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pengelola',
        'doktor',
        'magister',
        'profesi',
        'jumlah',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
        'id_tahun',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function tahun_pengajuan()
    {
        return $this->belongsTo(DataPengajuan::class, 'id_tahun');
    }
}