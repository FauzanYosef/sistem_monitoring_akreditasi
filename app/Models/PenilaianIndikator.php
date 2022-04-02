<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenilaianIndikator extends Model
{
    use SoftDeletes;

    public $table = 'penilaian_indikators';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'indikator_skor_id',
        'pilihan_penilaian',
        'label_nilai',
        'skor_nilai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function indikator_skor()
    {
        return $this->belongsTo(IndikatorPenilaian::class, 'indikator_skor_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}