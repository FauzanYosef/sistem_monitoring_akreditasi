<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataProdi extends Model
{
    use SoftDeletes;

    public const STATUS_PRODI_SELECT = [
        '1' => 'Aktif',
        '2' => 'Pembinaan',
        '3' => 'Tidak Aktif',
    ];

    public const JENJANG_PRODI_SELECT = [
        '1' => 'Magister/S2',
        '2' => 'Sarjana/S1',
        '3' => 'Profesi/D3',
    ];

    public $table = 'data_prodis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_pt_id',
        'kode_prodi_id',
        'jenjang_prodi',
        'telp_prodi',
        'email_prodi',
        'web_prodi',
        'alamat_prodi',
        'status_prodi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_pt()
    {
        return $this->belongsTo(DataPt::class, 'id_pt_id');
    }

    public function kode_prodi()
    {
        return $this->belongsTo(Kodeprodi::class, 'kode_prodi_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}