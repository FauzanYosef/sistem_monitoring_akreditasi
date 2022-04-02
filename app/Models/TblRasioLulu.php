<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblRasioLulu extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const TAHUN_MASUK_SELECT = [
        '1' => 'TS-6',
        '2' => 'TS-5',
        '3' => 'TS-4',
        '4' => 'TS-3',
        '5' => 'TS-2',
        '6' => 'TS-1',
        '7' => 'TS',
    ];

    public const PRODI_SELECT = [
        '1' => 'Doktor/Doktor Terapan/Subspesialis',
        '2' => 'Magister/Magister Terapan/Spesialis',
        '3' => 'Profesi 1 Tahun',
        '4' => 'Profesi 2 Tahun',
        '5' => 'Sarjana/Diploma Empat/Sarjana Terapan',
        '6' => 'Diploma Tiga',
        '7' => 'Diploma Dua',
        '8' => 'Diploma Satu',
    ];

    public $table = 'tbl_rasio_lulus';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'prodi',
        'tahun_masuk',
        'jml_mhs_6',
        'jml_mhs_5',
        'jml_mhs_4',
        'jml_mhs_3',
        'jml_mhs_2',
        'jml_mhs_1',
        'jml_mhs',
        'jml_lulusan',
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