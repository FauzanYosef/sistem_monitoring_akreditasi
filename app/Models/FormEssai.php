<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class FormEssai extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public $table = 'form_essais';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'elemen_id',
        'isi_essai',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function elemen()
    {
        return $this->belongsTo(IndikatorPenilaian::class, 'elemen_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}