<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelSertifikasiEksternal extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const TINGKAT_SELECT = [
        '1' => 'Internasional',
        '2' => 'Nasional',
    ];

    public const LINGKUP_SELECT = [
        '1' => 'Perguruan Tinggi',
        '2' => 'Fakultas',
        '3' => 'Unit',
    ];

    public $table = 'tabel_sertifikasi_eksternals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lembaga_akreditasi',
        'id_tahun',
        'jenis_akreditasi',
        'lingkup',
        'tingkat',
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
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}