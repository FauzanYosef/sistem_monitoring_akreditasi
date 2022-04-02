<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeniliaianAssesor extends Model
{
    use SoftDeletes;

    public $table = 'peniliaian_assesors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_assesor_id',
        'id_skor_id',
        'nilai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_assesor()
    {
        return $this->belongsTo(PemilihanAsesor::class, 'id_assesor_id');
    }

    public function id_skor()
    {
        return $this->belongsTo(PenilaianIndikator::class, 'id_skor_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}