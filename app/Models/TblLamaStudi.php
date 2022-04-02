<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblLamaStudi extends Model
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

    public $table = 'tbl_lama_studis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'program_pendidikan',
        'jumlah_ps',
        'jml_lulusan_2',
        'jml_lulusan_1',
        'jml_lulusan',
        'average_masa_2',
        'average_masa_1',
        'average_masa',
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