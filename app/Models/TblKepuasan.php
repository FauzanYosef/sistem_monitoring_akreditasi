<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblKepuasan extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const ASPEK_PENILAIAN_SELECT = [
        '1' => 'Etika',
        '2' => 'Keahlian pada bidang ilmu (kompetensi utama)',
        '3' => 'Kemampuan berbahasa asing',
        '4' => 'Penggunaan teknologi informasi',
        '5' => 'Kemampuan berkomunikasi',
        '6' => 'Kerjasama',
        '7' => 'Pengembangan diri',
    ];

    public $table = 'tbl_kepuasans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'aspek_penilaian',
        'hasil_penilaian_4',
        'hasil_penilaian_3',
        'hasil_penilaian_2',
        'hasil_penilaian',
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