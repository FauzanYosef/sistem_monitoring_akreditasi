<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblRefPenilaian extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const PROGRAM_PENDIDIKAN_SELECT = [
        '1' => 'Doktor/ Doktor Terapan/ Subspesialis',
        '2' => 'Magister/ Magister Terapan/ Spesialis',
        '3' => 'Profesi 1 Tahun',
        '4' => 'Profesi 2 Tahun',
        '5' => 'Sarjana/ Diploma Empat/ Sarjana Terapan',
        '6' => 'Diploma Tiga',
        '7' => 'Diploma Dua',
        '8' => 'Diploma Satu',
    ];

    public $table = 'tbl_ref_penilaians';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'program_pendidikan',
        'jumlah_ps',
        'jml_lulusan_4',
        'jml_lulusan_3',
        'jml_lulusan',
        'jwb_lulusan_4',
        'jwb_lulusan_3',
        'jwb_lulusan_2',
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