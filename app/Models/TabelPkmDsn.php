<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelPkmDsn extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const SUMBER_BIAYA_SELECT = [
        '1' => 'Perguruan Tinggi atau Mandiri',
        '2' => 'Lembaga dalam negeri (diluar PT)',
        '3' => 'Lembaga Luar Negeri',
    ];

    public $table = 'tabel_pkm_dsns';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sumber_biaya',
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