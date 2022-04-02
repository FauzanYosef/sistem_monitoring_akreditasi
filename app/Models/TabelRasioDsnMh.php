<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TabelRasioDsnMh extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const UNIT_PENGELOLA_SELECT = [
        '1' => 'fakultas',
        '2' => 'Departemen',
        '3' => 'Jurusan',
    ];

    public $table = 'tabel_rasio_dsn_mhs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unit_pengelola',
        'jml_dosen',
        'jml_mhs',
        'jml_mhs_ta',
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