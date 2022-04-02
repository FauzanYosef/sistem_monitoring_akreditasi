<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Traits\MultiTenantModelTrait;
class Borang extends Model
{
    use SoftDeletes;
    // use MultiTenantModelTrait;

    public $table = 'borangs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_file',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}