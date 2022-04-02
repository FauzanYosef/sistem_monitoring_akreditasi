<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use App\Traits\MultiTenantModelTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Fileupload extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;
    use MultiTenantModelTrait;

    public $table = 'fileuploads';

    protected $appends = [
        'uploaddata',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'namafile_id',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function namafile()
    {
        return $this->belongsTo(Borang::class, 'namafile_id');
    }

    public function getUploaddataAttribute()
    {
        return $this->getMedia('uploaddata')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}