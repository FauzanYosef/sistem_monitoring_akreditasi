<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelSertifikasiDosen extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const UNIT_PENGELOLA_SELECT = [
        '1' => 'Fakultas',
        '2' => 'Departemen',
        '3' => 'Jurusan',
    ];

    public $table = 'tabel_sertifikasi_dosens';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unit_pengelola',
        'jml_dosen',
        'jml_dosen_sertifikat',
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