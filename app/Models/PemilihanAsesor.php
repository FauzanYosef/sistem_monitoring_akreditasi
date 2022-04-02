<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemilihanAsesor extends Model
{
    use SoftDeletes;

    public $table = 'pemilihan_asesors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'prodi_id',
        'id_assesor_id',
        'id_pemilihan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function prodi()
    {
        return $this->belongsTo(Kodeprodi::class, 'prodi_id');
    }

    public function id_assesor()
    {
        return $this->belongsTo(DataAsesor::class, 'id_assesor_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}