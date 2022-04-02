<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelJabatanDosen extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const PENDIDIKAN_SELECT = [
        '1' => 'Doktor/ Doktor Terapan/ Subspesialis',
        '2' => 'Magister/ Magister Terapan/ Spesialis',
        '3' => 'Profesi',
    ];

    public $table = 'tabel_jabatan_dosens';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pendidikan',
        'gr_besar',
        'lektor_kepala',
        'lektor',
        'asisten_ahli',
        'tenaga_pengajar',
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