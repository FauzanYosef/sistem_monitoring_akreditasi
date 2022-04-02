<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblPrestasiAkademik extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const TINGKAT_SELECT = [
        '1' => 'Provinsi/Wilayah',
        '2' => 'Nasional',
        '3' => 'Internasional',
    ];

    public $table = 'tbl_prestasi_akademiks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_kegiatan',
        'waktu',
        'tingkat',
        'prestasi',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}