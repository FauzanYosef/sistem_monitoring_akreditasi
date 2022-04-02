<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelSeleksimhsbaru extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public $table = 'tabel_seleksimhsbarus';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'program_studi',
        'tahun_akademik',
        'daya_tampung',
        'jumlah_calon_pendaftar',
        'jumlah_lulus_seleksi',
        'jml_mhs_baru_reguler',
        'jml_mhs_transfer',
        'total_mhs_reguler',
        'total_mhs_transfer',
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