<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblPublikasiIlmiah extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const JENIS_PUBLIKASI_SELECT = [
        '1' => 'Jurnal penelitian tidak terakreditasi',
        '2' => 'Jurnal penelitian nasional terakreditasi',
        '3' => 'Jurnal penelitian internasional',
        '4' => 'Jurnal penelitian internasional bereputasi',
        '5' => 'Seminar wilayah/lokal/perguruan tinggi',
        '6' => 'Seminar nasional',
        '7' => 'Seminar internasional',
        '8' => 'Tulisan di media massa nasional',
        '9' => 'Tulisan di media massa internasional',
    ];

    public $table = 'tbl_publikasi_ilmiahs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'jenis_publikasi',
        'jml_judul_1',
        'jml_judul_2',
        'jml_judul_3',
        'jumlah',
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