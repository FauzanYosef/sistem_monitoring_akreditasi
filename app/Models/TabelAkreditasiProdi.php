<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelAkreditasiProdi extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const PERINGKAT_SELECT = [
        '1' => 'A',
        '2' => 'B',
        '3' => 'C',
        '4' => 'D/Tidak Lulus',
    ];

    public $table = 'tabel_akreditasi_prodis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lembaga_akreditasi_internasional',
        'id_tahun',
        'prodi_id',
        'peringkat',
        'masa_berlaku',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function tahun_pengajuan()
    {
        return $this->belongsTo(DataPengajuan::class, 'id_tahun');
    }
    public function prodi()
    {
        return $this->belongsTo(Kodeprodi::class, 'prodi_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}