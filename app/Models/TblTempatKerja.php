<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblTempatKerja extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const PROGRAM_PENDIDIKAN_SELECT = [
        '1' => 'Doktor/Doktor Terapan/Subspesialis',
        '2' => 'Magister/Magister Terapan/Spesialis',
        '3' => 'Profesi',
        '4' => 'Sarjana',
        '5' => 'Diploma Empat/Sarjana Terapan',
        '6' => 'Diploma Tiga',
        '7' => 'Diploma Dua',
        '8' => 'Diploma Satu',
    ];

    public $table = 'tbl_tempat_kerjas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'program_pendidikan',
        'jml_lulusan',
        'tingkat_1',
        'tingkat_2',
        'tingkat_3',
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