@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.peniliaianAssesor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.home') }}">
                Kembali
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    @foreach($dataPengajuans as $key => $dataPengajuan)
                    <tr data-entry-id="{{ $dataPengajuan->id }}">
                    <th>
                        Berkas
                    </th>
                    <th>
                        Keterangan
                    </th>
                    <tr>
                        <th>
                           1. Tahun Monitoring dan Evaluasi Akreditasi
                        </th>
                        <td>
                        {{ $dataPengajuan->tahun_pengajuan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            2. Sertifikasi/Akreditasi Eksternal
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_sertifikasi_eksternal == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-sertifikasi-eksternals.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-sertifikasi-eksternals.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            3. Akreditasi Internasional Program Studi
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_akreditasi_prodi == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-akreditasi-prodis.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-akreditasi-prodis.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                    <th>
                            4. Audit Eksternal Keuangan
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_audit_keuangan == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-audit-keuangans.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-audit-keuangans.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            5. Akreditasi Program Studi
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_akre_prodis == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-akre-prodis.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-akre-prodis.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            6. Kerjasama Perguruan Tinggi
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_kerjasama_pts == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-kerjasama-pts.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-kerjasama-pts.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            7. Seleksi Mahasiswa Baru
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_seleksimhsbaru == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-seleksimhsbarus.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-seleksimhsbarus.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            8. Mahasiswa Asing
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_mhs_asing == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-mhs-asings.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-mhs-asings.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        9. Kecukupan Dosen Perguruan Tinggi
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_kckpan_dsn == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-kckpan-dsns.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-kckpan-dsns.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        10. Jabatan Akademik Dosen Tetap
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_jbtn_dsn == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-jabatan-dosens.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-jabatan-dosens.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        11. Sertifikasi Dosen (Pendidik Profesional/Profesi/Industri/Kompetensi) yang masih berlaku dalam 3 tahun terakhir
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_sertifikasi_dsn == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-sertifikasi-dosens.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-sertifikasi-dosens.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        12. Dosen Tidak Tetap
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_dsntdk_tetap == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-dsntdk-tetaps.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-dsntdk-tetaps.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        13. Rasio Dosen terhadap Mahasiswa
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_rasio_dsn_mhs == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-rasio-dsn-mhs.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-rasio-dsn-mhs.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        14. Produktivitas Penelitian Dosen
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_penelitian_dsn == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-penelitian-dosens.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-penelitian-dosens.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        15. Produktivitas PkM Dosen
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_pkm_dsn == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-pkm-dsns.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-pkm-dsns.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        16. Rekognisi Dosen
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_rekognisi_dsn == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tabel-rekognisi-dosens.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tabel-rekognisi-dosens.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        17. Perolehan Dana
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_perolehan_dana == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-perolehan-danas.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-perolehan-danas.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        18. Penggunaan Dana
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_penggunaan_dana == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-penggunaan-danas.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-penggunaan-danas.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        19. Indeks Prestasi Mahasiswa (IPK)
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_ipk == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-ipks.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-ipks.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        20. Prestasi Akademik Mahasiswa
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_prestasi_akademik == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-prestasi-akademiks.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-prestasi-akademiks.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        21. Prestasi Non-akademik Mahasiswa
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_prestasi_non == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-prestasi-nons.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-prestasi-nons.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        22. Lama Studi Mahasiswa
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_lama_studi == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-lama-studis.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-lama-studis.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        23. Rasio kelulusan tepat waktu dan rasio keberhasilan studi
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_rasio_lulus == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-rasio-lulus.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-rasio-lulus.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        24. Data referensi untuk penilaian butir 5.d.1, 5.d.2 dan 5.e.2
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_ref_peniliaian == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-ref-penilaians.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-ref-penilaians.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        25. Waktu Tunggu Lulusan
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_waktu_lulusans == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-waktu-lulusans.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-waktu-lulusans.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        26. Kesesuaian Bidang Kerja Lulusan
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_persentase_kerja == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-persentase-kerjas.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-persentase-kerjas.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        27. Data referensi untuk penilaian butir 5.e.1
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_referensi == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-referensis.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-referensis.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        28. Kepuasan Pengguna Lulusan
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_kepuasan == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-kepuasans.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-kepuasans.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        29. Tempat Kerja Lulusan
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_tempat_kerja == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-tempat-kerjas.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-tempat-kerjas.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        30. Publikasi Ilmiah
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_publikasi_ilmiah == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-publikasi-ilmiahs.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-publikasi-ilmiahs.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        31. Sitasi Karya Ilmiah dalam 3 tahun terakhir
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_sitasi_karya == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-sitasi-karyas.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-sitasi-karyas.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                        32. Luaran Lainnya
                        </th>
                        <td>
                            @if($dataPengajuan->tbl_luaran_lainya == 0)
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.tbl-luaran-lainnyas.index') }}">
                                    Belum Selesai
                                </a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tbl-luaran-lainnyas.index') }}">
                                    Sudah Selesai
                                </a>
                            @endif
                        </td>
                    </tr>
                    

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.home') }}">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>



@endsection