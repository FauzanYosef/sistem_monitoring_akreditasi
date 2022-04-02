<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPt extends Model
{
    use SoftDeletes;

    public const JENIS_PT_SELECT = [
        '1' => 'Institut',
        '2' => 'Sekolah Tinggi',
    ];

    public const STATUS_PT_SELECT = [
        '1' => 'Aktif',
        '2' => 'Pembinaan',
        '3' => 'Tidak Aktif',
    ];

    public const JENIS_PENGELOLAAN_SELECT = [
        '1' => 'Perguruan Tinggi Negeri - Satker',
        '2' => 'Perguruan Tinggi Negeri - Badan Layanan Umum',
        '3' => 'Perguruan Tinggi Negeri - Badan Hukum',
        '4' => 'Perguruan Tinggi Swasta',
    ];

    public $table = 'data_pts';

    protected $dates = [
        'tgl_sk_pendirian_pt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_pt',
        'nama_pt',
        'jenis_pt',
        'jenis_pengelolaan',
        'status_pt',
        'alamat_pt',
        'no_telp_pt',
        'email_pt',
        'web_pt',
        'no_sk_pendirian_pt',
        'tgl_sk_pendirian_pt',
        'peringkat_akre_pt',
        'no_sk_banpt',
        'ts_pt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTglSkPendirianPtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglSkPendirianPtAttribute($value)
    {
        $this->attributes['tgl_sk_pendirian_pt'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}