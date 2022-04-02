<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblPerolehanDana extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const SUMBER_DANA_SELECT = [
        '1' => 'Mahasiswa',
        '2' => 'Kementrian/Yayasan',
        '3' => 'PT Sendiri',
        '4' => 'Sumber Lain (Dalam & Luar Negeri)',
        '5' => 'Dana Penelitian & PKM',
    ];

    public $table = 'tbl_perolehan_danas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sumber_dana',
        'jenis_dana',
        'jml_ts_2',
        'jml_dana_ts_1',
        'jml_dana_ts',
        'jml',
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