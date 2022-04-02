<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\MultiTenantModelTrait;

class TabelKerjasamaPt extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;
    use MultiTenantModelTrait;

    public const TINGKAT_SELECT = [
        '1' => 'Internasional',
        '2' => 'Nasional',
        '3' => 'Wilayah/Lokal',
    ];

    public $table = 'tabel_kerjasama_pts';

    protected $appends = [
        'bukti',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lembaga',
        'tingkat',
        'bentuk',
        'berlaku',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
        'id_tahun',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getBuktiAttribute()
    {
        return $this->getMedia('bukti');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function tahun_pengajuan()
    {
        return $this->belongsTo(DataPengajuan::class, 'id_tahun');
    }
}