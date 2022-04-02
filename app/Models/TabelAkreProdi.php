<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelAkreProdi extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const STATUS_AKREDITASI_SELECT = [
        '1' => 'Terakreditasi Unggul',
        '2' => 'Terakreditasi A',
        '3' => 'Terakreditasi Baik Sekali',
        '4' => 'Terakreditasi B',
        '5' => 'Terakreditasi Baik',
        '6' => 'Terakreditasi C',
        '7' => 'Terakreditasi Minimum',
        '8' => 'Tidak Terakreditasi/Kadaluarsa',
    ];

    public $table = 'tabel_akre_prodis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status_akreditasi',
        'jml_doktor',
        'jml_magister',
        'jml_sarjana',
        'jml_profesi_2',
        'jml_profesi_1',
        'jml_profesi',
        'jml_vokasi_1',
        'jml_vokasi_2',
        'jml_vokasi_4',
        'jml_vokasi_5',
        'jml_vokasi_6',
        'jml_vokasi_7',
        'total',
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