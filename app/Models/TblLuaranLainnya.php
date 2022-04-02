<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenantModelTrait;

class TblLuaranLainnya extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;

    public const HAKCIPTA_SELECT = [
        '1' => 'HKI: a) Paten, b) Paten Sederhana',
        '2' => 'HKI: a) Hak Cipta, b) Desain Produk Industri,  c) Perlindungan Varietas Tanaman (Sertifikat Perlindungan Varietas Tanaman, Sertifikat Pelepasan Varietas, Sertifikat Pendaftaran Varietas), d) Desain Tata Letak Sirkuit Terpadu, e) dll.)',
        '3' => 'Teknologi Tepat Guna, Produk (Produk Terstandarisasi, Produk Tersertifikasi), Karya Seni, Rekayasa Sosial',
        '4' => 'Buku ber-ISBN, Book Chapter',
    ];

    public $table = 'tbl_luaran_lainnyas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hakcipta',
        'penelitian',
        'tahun',
        'keterangan',
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